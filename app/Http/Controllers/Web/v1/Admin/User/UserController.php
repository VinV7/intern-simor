<?php

namespace App\Http\Controllers\Web\v1\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_data = $request->all();

        $user_data['password'] = Hash::make($user_data['password']);

        User::create($user_data);

        return response()->json([
            "success" => true,
            "message" => "User data saved successfully",
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = user::query()->findOrFail($id);

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = user::query()->findOrFail($id);

        return view('admin.users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = user::query()->findOrFail($id);

        $user->update($request->all());

        return response()->json([
            "success" => true,
            "message" => "User data updated successfully",
            "data" => $user
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = user::query()->findOrFail($id);
        
        $user->delete();

        return back();
    }
}
