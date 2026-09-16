<?php

namespace App\Http\Controllers\Api\v1\Admin\ActivitiesCategories;

use App\Http\Controllers\Controller;
use App\Models\ActivityCategory;
use Illuminate\Http\Request;

class ActivitiesCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = ActivityCategory::query()->get();

        return response()->json([
            'success' => true,
            'message' => 'Activity categories successfully returned',
            'data' => $activities,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $activity = ActivityCategory::query()->create($request->all());

        return response()->json([
            'success' => true, 
            'message' => 'Activity category created successfully',
            'data'    => $activity
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activity = ActivityCategory::query()->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Activity category successfully returned',
            'data' => $activity
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $activity = ActivityCategory::query()
            ->findOrFail($id)
            ->update($request->all());

        return response()->json([
            'success' => true,
            'message' => "Activity category updated successfully",
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = ActivityCategory::query()->findOrFail($id);
        $activity->delete();

        return response()->json([
            'success' => true,
            'message' => 'Activity category deleted successfully'
        ]);
    }
}
