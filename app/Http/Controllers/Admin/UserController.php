<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Middleware is applied in the route definition
    }

    /**
     * Display a listing of all approved users.
     */
    public function index()
    {
        $users = User::where('is_approved', true)
            ->where(function($query) {
                $query->where('role', User::ROLE_ADMIN)
                      ->orWhere('role', User::ROLE_SUPERADMIN);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Display a listing of pending user approvals.
     */
    public function pending()
    {
        $users = User::where('is_approved', false)
            ->where('role', User::ROLE_ADMIN) // Only show pending admins
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.users.pending', compact('users'));
    }

    /**
     * Approve a user registration.
     */
    public function approve($id)
    {
        $user = User::findOrFail($id);
        $currentUser = Auth::user();
        
        // Only superadmin can approve admins
        if ($currentUser && $currentUser->role === User::ROLE_SUPERADMIN && $user->role === User::ROLE_ADMIN) {
            $user->update(['is_approved' => true]);
            return redirect()->route('admin.users.pending')
                ->with('success', 'Admin approved successfully.');
        }
        
        return redirect()->route('admin.users.pending')
            ->with('error', 'You do not have permission to perform this action.');
    }

    /**
     * Reject a user registration.
     */
    public function reject($id)
    {
        $user = User::findOrFail($id);
        $currentUser = Auth::user();
        
        // Don't allow deleting yourself
        if ($currentUser && $user->id === $currentUser->id) {
            return redirect()->route('admin.users.pending')
                ->with('error', 'You cannot delete your own account.');
        }
        
        // Only superadmin can reject admins
        if ($currentUser && $currentUser->role === User::ROLE_SUPERADMIN && $user->role === User::ROLE_ADMIN) {
            $user->delete();
            return redirect()->route('admin.users.pending')
                ->with('success', 'Admin rejected and deleted successfully.');
        }
        
        return redirect()->route('admin.users.pending')
            ->with('error', 'You do not have permission to perform this action.');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
