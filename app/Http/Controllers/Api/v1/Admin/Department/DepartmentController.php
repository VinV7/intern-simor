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

        return view('admin.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departments.create');
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

        return view('admin.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::query()->findOrFail($id);

        return view('admin.departments.update', compact('department'));
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
            'data'    => $department
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::query()->findOrFail($id);
        $department->delete();

        return back();
    }
}
