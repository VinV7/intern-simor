@extends('layouts.app');

@section('title', 'Kelola User')

@section('content')

  <div class="flex flex-col gap-4">
    <h2 id="modalTitle" class="text-xl font-bold text-gray-900 sm:text-2xl">Data User</h2>

    <p id="modalDescription" class="text-pretty text-gray-700">
        Email : {{ $user->email }}
    </p>
    <p id="modalDescription" class="text-pretty text-gray-700">
        Name : {{ $user->name }}
    </p>
  </div>

  @endsection