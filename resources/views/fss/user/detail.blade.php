@extends('layouts.app')

@section('title', 'Kelola Department')

@section('content')

<div class="flex flex-col gap-6">

<h2 class="text-xl font-bold text-gray-900 sm:text-2xl">
    Data User
</h2>

<div>
    <h3 class="text-lg font-semibold text-gray-900">
        {{ $user->name }}
    </h3>

    <p>
        --- Department : ---
    </p>
    <div class="mt-2">
        {{ $user->department->name }}
    </div>

    <p>
        --- Activities : ---
    </p>

    <div class="mt-2">
        @foreach ($user->activities as $activity)
            <p class="text-pretty text-gray-700">
                {{ $activity->description }}
            </p>
        @endforeach
    </div>
</div>
</div>

@endsection
