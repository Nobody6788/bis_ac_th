<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::orderBy('order')->get();
        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:1048576', // 1GB in KB
            'order' => 'integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('programs', 'public');
        }

        $program = Program::create($validated);

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        return view('admin.programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'image' => 'nullable|image|max:1048576', // 1GB in KB
            'order' => 'integer|min:0',
            'is_active' => 'boolean',
            'remove_image' => 'sometimes|boolean'
        ]);

        // Handle image upload/removal
        if ($request->has('remove_image') && $program->image) {
            Storage::disk('public')->delete($program->image);
            $validated['image'] = null;
        } elseif ($request->hasFile('image')) {
            // Delete old image if exists
            if ($program->image) {
                Storage::disk('public')->delete($program->image);
            }
            $validated['image'] = $request->file('image')->store('programs', 'public');
        }

        $program->update($validated);

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        // Delete associated image
        if ($program->image) {
            Storage::disk('public')->delete($program->image);
        }
        
        $program->delete();

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program deleted successfully.');
    }

    /**
     * Toggle program status
     */
    public function toggleStatus(Program $program)
    {
        $program->update([
            'is_active' => !$program->is_active
        ]);

        return response()->json([
            'status' => 'success',
            'is_active' => $program->is_active
        ]);
    }
}
