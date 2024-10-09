<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    // Create a new timesheet
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'task_name' => 'required|string|max:255',
                'date' => 'required|date',
                'hours' => 'required|integer',
                'user_id' => 'required|exists:users,id',
                'project_id' => 'required|exists:projects,id',
            ]);
    
            $timesheet = Timesheet::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Operation successful',
                'data' => $timesheet
            ], 201);
        }catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    // Get a single timesheet by id
    public function show($id)
    {
        try {
            $timesheet = Timesheet::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'message' => 'Operation successful',
                'data' => $timesheet
            ], 200);
        }catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    // Get all timesheets
    public function index()
    {
        try{
            $timesheets = Timesheet::all();
            return response()->json([
                'status' => 'success',
                'message' => 'Operation successful',
                'data' => $timesheets
            ], 200);
        }catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    // Update timesheet
    public function update(Request $request)
    {
        try {
            $timesheet = Timesheet::findOrFail($request->id);
            $data = $request->except('id');
            $timesheet->update($data);
            return response()->json([
                'status' => 'success',
                'message' => 'Operation successful',
                'data' => $timesheet
            ], 200);
        }catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    // Delete timesheet
    public function destroy(Request $request)
    {
        try {
            $timesheet = Timesheet::findOrFail($request->id);
            $timesheet->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Timesheet deleted successfully'
            ]);
        }catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}

