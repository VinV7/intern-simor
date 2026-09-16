<?php

namespace App\Http\Controllers\Api\v1\fss\Department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Department;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $sort = $request->query('sort', 'desc');
        $sort = in_array(strtolower($sort), ['asc', 'desc']) ? strtolower($sort) : 'desc';

        $departments = Department::query()
            ->with('users:id,name,department_id')
            ->withCount('users')
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('code', 'like', "%{$search}%");
                });
            })
            ->orderBy('users_count', $sort)
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Department detail retrieved successfully',
            'data' => $departments->map(function ($department) {
                return [
                    'id' => $department->id,
                    'name' => $department->name,
                    'code' => $department->code,
                    'users_count' => $department->users_count,
                    'users' => $department->users,
                ];
            }),
        ]);
    }

    /** 
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::query()
            ->withCount('users')
            ->with('users:id,department_id,name,email')
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Department detail retrieved successfully',
            'data' => [
                'id' => $department->id,
                'name' => $department->name,
                'code' => $department->code,
                'users_count' => $department->users_count,
                'users' => $department->users,
            ],
        ]);
    }
}
