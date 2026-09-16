<?php

namespace App\Http\Controllers\Web\v1\fss\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\User;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::all();

        $users = User::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('search') . '%');
            })
            ->when($request->filled('department'), function ($query) use ($request) {
                $query->whereHas('department', function ($q) use ($request) {
                    $q->where('name', $request->input('department'));
                });
            })
            ->withCount('activities')
            ->get();

        return view('fss.user.index', compact('departments', 'users'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::query()->findOrFail($id);

        $user->query()
            ->with('department:id,name,code')
            ->with('activities:id,description')
            ->get();
        
        return view('fss.user.detail', compact('user'));
    }
}
