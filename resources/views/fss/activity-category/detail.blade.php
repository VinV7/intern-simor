@extends('layouts.app')

@section('title', 'Kelola Department')

@section('content')

<div class="flex flex-col gap-6">

<h2 class="text-xl font-bold text-gray-900 sm:text-2xl">
    Data Aktivitas
</h2>

<div>
    <h3 class="text-lg font-semibold text-gray-900">
        Category : {{ $activity->name }} - {{ $activity->activities_count }}
    </h3>

    <p>
        Activities : 
    </p>

    <div class="mt-2">
        @foreach ($activity->activities as $act)
            <p class="text-pretty text-gray-700">
                {{ $act->description }}
            </p>
        @endforeach
    </div>
</div>
</div>

@endsection
