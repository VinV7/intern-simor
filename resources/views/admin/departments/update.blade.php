@extends('layouts.app')

@section('title', 'Update Department')

@section('content')
 <form action="{{ route('departments.update', ["id" => $department->id]) }}" method="POST" class="bg-white rounded-lg shadow p-6 w-96">
    @csrf
    @method('PUT')
    <h3 class="text-lg font-semibold mb-4">Update Departemen | {{$department->id}} : {{$department->name}}</h3>

    <input id="input-name" type="text" name="name" placeholder="Nama Departemen"
            class="w-full border rounded px-3 py-2 mb-3">

    <input id="input-code" type="text" name="code" placeholder="Kode Departemen"
            class="w-full border rounded px-3 py-2 mb-4">

    <div class="flex justify-end gap-2">
        <a href="{{ route('departments.index') }}" class="px-4 py-2 rounded border">Batal</a>
        <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white">Simpan</button>
    </div>
</form>

@endsection