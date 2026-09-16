@extends('layouts.app')

@section('title', 'Update Department')

@section('content')
 <form action={{ route('users.store') }} method="POST" class="bg-white rounded-lg shadow p-6 w-96">
    @csrf
    <h3 class="text-lg font-semibold mb-4">Tambah User</h3>

    <input id="input-email" type="text" name="email" placeholder="Email"
            class="w-full border rounded px-3 py-2 mb-3">

    <input id="input-name" type="text" name="name" placeholder="Name"
            class="w-full border rounded px-3 py-2 mb-4">

    <input id="input-password" type="password" name="password" placeholder="Password"
            class="w-full border rounded px-3 py-2 mb-4">
          
    <input id="input-address" type="text" name="address" placeholder="Address"
            class="w-full border rounded px-3 py-2 mb-4">

    <div class="flex justify-end gap-2">
        <a href="{{ route('users.index') }}" class="px-4 py-2 rounded border">Batal</a>
        <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white">Simpan</button>
    </div>
</form>

@endsection