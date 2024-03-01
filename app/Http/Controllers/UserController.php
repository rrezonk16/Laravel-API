<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    

    public function edit(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            // Add other fields as needed
        ]);

        // Get authenticated user
        $user = Auth::user();

        // Update user data
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Update other fields as needed
        $user->save();

        // Return updated user data
        return response()->json([
            'message' => 'User data updated successfully',
            'user' => $user->only(['id', 'name', 'email']),
        ], 200);
    }

    public function getUserData()
    {
        // Get authenticated user
        $user = Auth::user();

        // Return user data
        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
        ], 200);
    }
}
