@extends('layouts.app')

@section('title', 'Update Department')

@section('content')
 <form action="{{ route('categories-activities.update', ["id" => $activity->id]) }}" method="POST" class="bg-white rounded-lg shadow p-6 w-96">
    @csrf
    @method('PUT')
    <h3 class="text-lg font-semibold mb-4">Update Nama Aktivitas | {{$activity->name}}</h3>

    <input id="input-name" type="text" name="name" placeholder="Jenis Aktivitas"
            class="w-full border rounded px-3 py-2 mb-3">

    <div class="flex justify-end gap-2">
        <a href="{{ route('categories-activities.index') }}" class="px-4 py-2 rounded border">Batal</a>
        <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white">Simpan</button>
    </div>
</form>

@endsection