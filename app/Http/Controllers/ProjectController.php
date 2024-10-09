<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Create a new project
    public function store(Request $request)
    {
        try{
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'department' => 'required|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'nullable|date',
                'status' => 'required|in:pending,in_progress,completed',
            ]);

            $project = Project::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Operation successful',
                'data' => $project
            ], 201);
        }catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    // Get a single project by id
    public function show($id)
    {
        try {
            $project = Project::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'message' => 'Operation successful',
                'data' => $project
            ], 200);
        }catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    // Get all projects
    public function index()
    {
        try{
            $projects = Project::all();
            return response()->json([
                'status' => 'success',
                'message' => 'Operation successful',
                'data' => $projects
            ], 200);
        }catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    // Update project
    public function update(Request $request)
    {
        try{
            $project = Project::findOrFail($request->id);
            $data = $request->except('id');
            $project->update($data);
            return response()->json([
                'status' => 'success',
                'message' => 'Operation successful',
                'data' => $project
            ], 200);
        }catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    // Delete project and related timesheets
    public function destroy(Request $request)
    {
        try {
            $project = Project::findOrFail($request->id);
            $project->timesheets()->delete(); // Delete related timesheets
            $project->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Project deleted successfully'
            ]);
        }catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}

