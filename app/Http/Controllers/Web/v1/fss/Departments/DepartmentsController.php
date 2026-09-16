<?php

namespace App\Http\Controllers\Web\v1\fss\Departments;

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

        $departments = Department::query()
            ->with('users:name')
            ->withCount('users')
            ->when($search, function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('code', 'like', "%{$search}%");
                });
            })
            ->orderBy('users_count', 'asc')
            ->get();

        return view('fss.department.index', compact('departments'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $departments = Department::query()->findOrFail($id);

        $departments->query()
            ->with('users:name')
            ->withCount('users')
            ->get();

        return view('fss.department.detail', compact('departments'));
    }
}
