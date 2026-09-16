@extends('layouts.app')

@section('title', 'Kelola Department')

@section('content')

<div class="flex flex-col gap-6">

<h2 class="text-xl font-bold text-gray-900 sm:text-2xl">
    Data Department
</h2>

<div>
    <h3 class="text-lg font-semibold text-gray-900">
        {{ $departments->name }} : {{ $departments->code }}
    </h3>

    <p>
        Members : 
    </p>

    <div class="mt-2">
        @foreach ($departments->users as $user)
            <p class="text-pretty text-gray-700">
                {{ $user->name }}
            </p>
        @endforeach
    </div>
</div>
</div>

@endsection
