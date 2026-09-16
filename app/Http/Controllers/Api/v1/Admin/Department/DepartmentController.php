<?php

namespace App\Http\Controllers\Api\v1\Admin\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::query()->get();

        return response()->json([
            'success' => true,
            'message' => 'Departments successfully returned',
            'data' => $departments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $department =  Department::query()->create($request->all());

        return response()->json([
            'success' => true, 
            'message' => 'Departments created successfully',
            'data'    => $department
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::query()->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Department successfuly returned',
            'data' => $department
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $department = Department::query()->findOrFail($id);

        $department->update($request->all());

        return response()->json([
            'success' => true, 
            'message' => 'Departments updated successfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::query()->findOrFail($id);
        $department->delete();

        return response()->json([
            'success' => true,
            'message' => 'Department successfully deleted'
        ]);
    }
}
