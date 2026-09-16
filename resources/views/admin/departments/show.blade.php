@extends('layouts.app');

@section('title', 'Kelola Department')

@section('content')

  <div class="flex flex-col gap-4">
    <h2 id="modalTitle" class="text-xl font-bold text-gray-900 sm:text-2xl">Data Department</h2>

    <p id="modalDescription" class="text-pretty text-gray-700">
        {{$department->name }}  :  {{ $department->code }}
    </p>
  </div>

  @endsection