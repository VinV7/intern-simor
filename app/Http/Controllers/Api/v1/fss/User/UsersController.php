<?php

namespace App\Http\Controllers\Api\v1\fss\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->query('sort', 'desc');
        $sort = in_array(strtolower($sort), ['asc', 'desc']) ? strtolower($sort) : 'desc';

        $users = User::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('search') . '%');
            })
            ->when($request->filled('department'), function ($query) use ($request) {
                $query->whereHas('department', function ($q) use ($request) {
                    $q->where('name', $request->input('department'));
                });
            })
            ->with('department:id,name,code')
            ->with(['activities' => function ($query) {
                $query->select('id', 'user_id', 'description', 'category_id', 'started_time', 'finished_time')
                    ->with('category:id,name');
            }])
            ->withCount('activities')
            ->orderBy('activities_count', $sort)
            ->get();

        return response()->json([
            "success" => true,
            "message" => "Employee detail retrieved successfully",
            "data" => $users->map(
                function ($user) {
                    return [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'department' => $user->department,
                        'activities' => $user->activities->map(function ($activity) {
                            return [
                                'id' => $activity->id,
                                'activity_category' => $activity->category,
                                'description' => $activity->description,
                                'started_at' => $activity->started_time,
                                'finished_at' => $activity->finished_time,
                            ];
                        })
                    ];
                }
            )
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::query()
            ->with('department:id,name,code')
            ->with(['activities' => function ($query) {
                $query->select('id', 'user_id', 'description', 'category_id', 'started_time', 'finished_time')
                    ->with('category:id,name');
            }])
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Employee detail retrieved successfully',
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'department' => $user->department,
                'activities' => $user->activities->map(function ($activity) {
                    return [
                        'id' => $activity->id,
                        'activity_category' => $activity->category,
                        'description' => $activity->description,
                        'started_at' => $activity->started_time,
                        'finished_at' => $activity->finished_time,
                    ];
                }),
            ]
        ]);
    }
}
