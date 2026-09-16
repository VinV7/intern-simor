<?php

namespace App\Http\Controllers\Api\v1\fss\ActivityCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ActivityCategory;

class ActivityCategoriesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $sort = $request->query('sort', 'desc');
        $sort = in_array(strtolower($sort), ['asc', 'desc']) ? strtolower($sort) : 'desc';

        $activities = ActivityCategory::query()
            ->with('activities:id,description,category_id,started_time,finished_time')
            ->withCount('activities')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('activities_count', $sort)
            ->get();

        return response()->json([
            'success' => true, 
            'message' => 'Activity category detail retrieved successfully',
            'data'    => $activities->map(function ($activity) {
                return [
                    'id' => $activity->id, 
                    'name' => $activity->name,
                    'activities_count' => $activity->activities_count,
                    'activities' => $activity->activities->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'description' => $item->description,
                            'started_at' => $item->started_time,
                            'finished_at' => $item->finished_time
                        ];
                    })
                ];
            })
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activity = ActivityCategory::query()
            ->withCount('activities')
            ->with('activities:id,description,category_id,started_time,finished_time')
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Activity category detail retrieved successfully',
            'data' => [
                'id' => $activity->id,
                'name' => $activity->name,
                'activities_count' => $activity->activities_count,
                'activities' => $activity->activities->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'description' => $item->description,
                        'started_at' => $item->started_time,
                        'finished_at' => $item->finished_time,
                    ];
                }),
            ],
        ]);
    }

}
