<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContentSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = ContentSection::orderBy('page')->orderBy('order')->get();
        return view('admin.content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'section_key' => 'required|string|unique:content_sections,section_key',
            'section_name' => 'required|string|max:255',
            'content' => 'required|string',
            'content_type' => 'required|in:text,html,markdown',
            'page' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        ContentSection::create([
            'section_key' => $request->input('section_key'),
            'section_name' => $request->input('section_name'),
            'content' => $request->input('content'),
            'content_type' => $request->input('content_type'),
            'page' => $request->input('page'),
            'order' => $request->input('order', 0),
            'is_active' => $request->has('is_active'),
            'metadata' => $request->input('metadata') ? json_decode($request->input('metadata'), true) : null
        ]);

        return redirect()->route('admin.content.index')
                       ->with('success', 'Content section created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContentSection $content)
    {
        return view('admin.content.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContentSection $content)
    {
        return view('admin.content.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContentSection $content)
    {
        // Debug logging
        \Log::info('Content Update Request', [
            'content_id' => $content->id,
            'section_key' => $request->input('section_key'),
            'new_content' => $request->input('content'),
            'old_content' => $content->content,
            'is_active_request' => $request->has('is_active'),
            'is_active_input' => $request->input('is_active'),
            'all_request_data' => $request->all()
        ]);
        
        $validator = Validator::make($request->all(), [
            'section_key' => 'required|string|unique:content_sections,section_key,' . $content->id,
            'section_name' => 'required|string|max:255',
            'content' => 'required|string',
            'content_type' => 'required|in:text,html,markdown',
            'page' => 'required|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->withInput();
        }

        $updateData = [
            'section_key' => $request->input('section_key'),
            'section_name' => $request->input('section_name'),
            'content' => $request->input('content'),
            'content_type' => $request->input('content_type'),
            'page' => $request->input('page'),
            'order' => $request->input('order', 0),
            'is_active' => $request->has('is_active'),
            'metadata' => $request->input('metadata') ? json_decode($request->input('metadata'), true) : null
        ];
        
        \Log::info('Content Update Data', ['update_data' => $updateData]);
        
        $content->update($updateData);
        
        // Log after update
        $content->refresh();
        \Log::info('Content After Update', [
            'id' => $content->id,
            'section_key' => $content->section_key,
            'content' => $content->content,
            'is_active' => $content->is_active,
            'updated_at' => $content->updated_at
        ]);

        return redirect()->route('admin.content.index')
                       ->with('success', 'Content section updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContentSection $content)
    {
        $content->delete();
        
        return redirect()->route('admin.content.index')
                       ->with('success', 'Content section deleted successfully!');
    }

    /**
     * Toggle active status
     */
    public function toggleStatus(ContentSection $content)
    {
        $content->update([
            'is_active' => !$content->is_active
        ]);

        return redirect()->back()
                       ->with('success', 'Content status updated successfully!');
    }

    /**
     * Bulk update content sections
     */
    public function bulkUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'action' => 'required|in:activate,deactivate,delete',
            'content_ids' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                           ->withErrors($validator)
                           ->with('error', 'Invalid bulk action request.');
        }

        $contentIds = json_decode($request->content_ids, true);
        
        if (!is_array($contentIds) || empty($contentIds)) {
            return redirect()->back()
                           ->with('error', 'No content sections selected.');
        }

        $contentSections = ContentSection::whereIn('id', $contentIds);
        $count = $contentSections->count();

        switch ($request->action) {
            case 'activate':
                $contentSections->update(['is_active' => true]);
                $message = "{$count} content sections activated successfully!";
                break;
                
            case 'deactivate':
                $contentSections->update(['is_active' => false]);
                $message = "{$count} content sections deactivated successfully!";
                break;
                
            case 'delete':
                $contentSections->delete();
                $message = "{$count} content sections deleted successfully!";
                break;
        }

        return redirect()->back()->with('success', $message);
    }

    /**
     * Preview content section
     */
    public function preview(ContentSection $content)
    {
        return response()->json([
            'success' => true,
            'content' => [
                'section_key' => $content->section_key,
                'section_name' => $content->section_name,
                'content' => $content->content,
                'content_type' => $content->content_type,
                'page' => $content->page,
                'is_active' => $content->is_active,
                'formatted_content' => $content->getFormattedContent()
            ]
        ]);
    }
}
