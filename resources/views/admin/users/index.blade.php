@extends('layouts.app')

@section('title', 'Kelola Users')

@section('content')
<div class="bg-white rounded-lg shadow p-6">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Data Users</h2>
        <div class="flex gap-5">
            <a href="{{ route('users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Tambah Users
            </a>
            <a href="{{ route('fss.users.index') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-slate-800">
                Lihat Detail
            </a>
        </div>

    </div>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b text-sm text-gray-500">
                <th class="py-2">Email</th>
                <th class="py-2">Nama</th>
                <th class="py-2 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody id="department-list">
            @foreach($users as $user)
                <tr class="border-b text-sm">
                    <td class="py-2">{{ $user->email }}</td>
                    <td class="py-2">{{ $user->name}}</td>
                    <td class="py-2 text-right">
                        <a href="{{ route('users.show', ["id" => $user->id]) }}">Lihat</a>
                        <a href="{{ route('users.edit', ["id" => $user->id]) }}">Update</a>
                        <form action="{{ route('users.destroy', ["id" => $user->id]) }}" method="POST"> 
                            @csrf
                            @method('DELETE')

                            <button onclick="deleteDepartment(${dept.id})" class="text-red-600 hover:underline">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script>
</script>
@endsection