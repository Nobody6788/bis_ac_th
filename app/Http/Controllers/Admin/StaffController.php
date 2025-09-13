<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::orderBy('sort_order')->get();
        return view('admin.staff.index', compact('staff'));
    }

    public function create()
    {
        return view('admin.staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048576', // 1GB in KB
            'sort_order' => 'integer',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // The store method returns the path, including the 'public/' prefix.
            // We store this path directly.
            $path = $request->file('image')->store('staff', 'public');
            $data['image'] = $path;
        }

        Staff::create($data);

        return redirect()->route('admin.staff.index')->with('success', 'Staff member created successfully.');
    }

    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1048576', // 1GB in KB
            'sort_order' => 'integer',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($staff->image) {
                Storage::disk('public')->delete($staff->image);
            }
            $path = $request->file('image')->store('staff', 'public');
            $data['image'] = $path;
        }

        $staff->update($data);

        return redirect()->route('admin.staff.index')->with('success', 'Staff member updated successfully.');
    }

    public function destroy(Staff $staff)
    {
        if ($staff->image) {
            Storage::disk('public')->delete($staff->image);
        }
        $staff->delete();
        return redirect()->route('admin.staff.index')->with('success', 'Staff member deleted successfully.');
    }
}
