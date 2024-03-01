<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;
        $user->assignRole('user');

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function registershop(Request $request) {
        $fields = $request->validate([
            'business_name' => 'required|string',
            'nui' => 'required|string|unique:business_info,nui',
            'owner_email' => 'required|string|unique:users,email',
            'owner_phone_number' => 'required|string',
            'password' => 'required|string|confirmed'
        ]);
    
        // Create a user
        $user = User::create([
            'name' => $fields['business_name'],
            'email' => $fields['owner_email'],
            'password' => bcrypt($fields['password'])
        ]);
    
        // Create a business_info entry
        $businessInfo = Business::create([
            'name' => $fields['business_name'],
            'nui' => $fields['nui'],
            'owner_id' => $user->id, // Assign user id as owner_id in business_info table
            'phone_number' => $fields['owner_phone_number'],
            'email' => $fields['owner_email'],
        ]);
    
        // Assign 'business' role to the user
        $user->assignRole('businessman');
    
        // Create a token for the user
        $token = $user->createToken('myapptoken')->plainTextToken;
    
        $response = [
            'user' => $user,
            'business_info' => $businessInfo,
            'token' => $token
        ];
    
        return response($response, 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
    
        // Check email
        $user = User::where('email', $fields['email'])->first();
    
        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad credentials'
            ], 401);
        }
    
        // Attempt to authenticate the user
        if (Auth::attempt($fields)) {
            $user = Auth::user();
    
            // Get the user's roles
            $roles = $user->getRoleNames(); // Assuming you're using Spatie for roles
    
            $response = [
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'roles' => $roles,
                ],
                'token' => $user->createToken('myapptoken')->plainTextToken,
            ];
    
            return response($response, 201);
        }
    
        return response([
            'message' => 'Bad credentials'
        ], 401);
    }
    public function logout(Request $request) {
        auth()->user()->tokens()->delete();
    
        return [
            'message' => 'Logged out'
        ];
    }
    
}
