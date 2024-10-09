<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Create a new user
    public function store(Request $request)
    {
        try{
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
                'gender' => 'required|in:male,female',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
            return response()->json([
                'status' => 'success',
                'message' => 'Operation successful',
                'data' => $user
            ], 201);

        }catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    // Get a single user by id
    public function show($id)
    {
        try{
            $user = User::findOrFail($id);

            return response()->json([
                'status' => 'success',
                'message' => 'Operation successful',
                'data' => $user
            ], 200);
        }catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    // Get all users
    public function index(Request $request)
    {
        try {
            // Initialize the query
            $query = User::query();

            // Apply filters
            if ($request->filled('first_name')) {
                $query->where('first_name', 'like', '%' . $request->first_name . '%');
            }

            if ($request->filled('gender')) {
                $query->where('gender', $request->gender);
            }

            if ($request->filled('date_of_birth')) {
                $query->where('date_of_birth', $request->date_of_birth);
            }

            // Get all users based on filters
            $users = $query->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Operation successful',
                'data' => $users
            ], 200);
            
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    // Update user
    public function update(Request $request)
    {
        try{
            $user = User::findOrFail($request->id);
            $data = $request->except('id');
            $user->update($data);
            return response()->json([
                'status' => 'success',
                'message' => 'Operation successful',
                'data' => $user
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    // Delete user and related timesheets
    public function destroy(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            $user->timesheets()->delete(); // Delete related timesheets
            $user->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'User deleted successfully'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
