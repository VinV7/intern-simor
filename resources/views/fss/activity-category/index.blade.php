@extends('layouts.app')

@section('title', 'Departements')

@section('content')

<form method="GET" action="{{ route('fss.activity-categories.index') }}">
    <label for="search">
        <span class="text-sm font-medium text-gray-700">
            Search
        </span>

        <div class="relative">
            <input
                type="text"
                id="search"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search category..."
                class="mt-0.5 w-full rounded border-gray-300 pe-10 shadow-sm sm:text-sm"
            />

            <span class="absolute inset-y-0 right-2 grid w-8 place-content-center">
                <button
                    type="submit"
                    aria-label="Submit search"
                    class="rounded-full p-1.5 text-gray-700 transition-colors hover:bg-gray-100"
                >
                    <svg
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-4"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                        />
                    </svg>
                </button>
            </span>
        </div>
    </label>
</form>

<div class="bg-white rounded-lg shadow p-6">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Data Kategori Aktivitas</h2>
    </div>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b text-sm text-gray-500">
                <th class="py-2">Nama</th>
                <th class="py-2">Activities Count</th>
                <th class="py-2 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody id="department-list">
            @foreach($activities as $activity)
                <tr class="border-b text-sm">
                    <td class="py-2">{{ $activity->name }}</td>
                    <td class="py-2">{{ $activity->activities_count }}</td>
                    <td class="py-2 text-right">
                        <a href="{{ route('fss.activity-categories.show', ["id" => $activity->id]) }}" class="text-blue-500">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection