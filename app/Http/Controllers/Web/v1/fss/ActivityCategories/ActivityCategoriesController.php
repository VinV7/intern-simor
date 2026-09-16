<?php

namespace App\Http\Controllers\Web\v1\fss\ActivityCategories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ActivityCategory;

class ActivityCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $activities = ActivityCategory::query()
            ->with('activities:id,description,category_id')
            ->withCount('activities')
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderByDesc('activities_count')
            ->get();

        return view('fss.activity-category.index', compact('activities'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activity = ActivityCategory::query()->findOrFail($id);

        $activity->query()
            ->with('activities:id,description,category_id')
            ->withCount('activities')
            ->get();

        return view('fss.activity-category.detail', compact('activity'));
    }
}
