@extends('layouts.app')

@section('title', 'Kelola Departemen')

@section('content')
<div class="bg-white rounded-lg shadow p-6">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Data Departemen</h2>
        <div class="flex gap-5">
            <a href="{{ route('categories-activities.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Tambah Kategori
            </a>
            <a href="{{ route('fss.activity-categories.index') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-slate-800">
                Lihat Detail
            </a>
        </div>

    </div>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b text-sm text-gray-500">
                <th class="py-2">Aktivitas</th>
                <th class="py-2 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody id="department-list">
            @foreach($activities as $act)
                <tr class="border-b text-sm">
                    <td class="py-2">{{ $act->name }}</td>
                    <td class="py-2 text-right">
                        <a href="{{ route('categories-activities.show', ["id" => $act->id]) }}">Lihat</a>
                        <a href="{{ route('categories-activities.edit', ["id" => $act->id]) }}">Update</a>
                        <form action="{{ route('categories-activities.destroy', ["id" => $act->id]) }}" method="POST"> 
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