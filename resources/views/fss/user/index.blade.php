@extends('layouts.app')

@section('title', 'Departements')

@section('content')

<form method="GET" action="{{ route('fss.users.index') }}">
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
                placeholder="Search User..."
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

<form action="{{ route('fss.users.index') }}" method="GET">
    <div class="relative inline-flex" id="department-dropdown">
        <span
            class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm"
        >
            <input
                type="text"
                name="department"
                id="department-input"
                value="{{ request('department', '') }}"
                placeholder="All departments"
                class="px-3 py-2 text-sm font-medium text-gray-700 focus:outline-none"
                readonly
            />

            <button
                type="button"
                id="department-toggle"
                class="px-3 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:relative"
                aria-label="Menu"
                aria-expanded="false"
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
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
        </span>

        <div
            role="menu"
            id="department-menu"
            class="absolute end-0 top-12 z-10 hidden w-56 overflow-hidden rounded border border-gray-300 bg-white shadow-sm"
        >
            @forelse ($departments ?? [] as $department)
                <button
                    type="button"
                    role="menuitem"
                    class="department-option block w-full px-3 py-2 text-left text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900"
                    data-name="{{ $department->name ?? '' }}"
                >
                    {{ $department->name ?? '—' }}
                </button>
            @empty
                <span class="block px-3 py-2 text-sm text-gray-400">
                    No departments found
                </span>
            @endforelse

            <button
                type="button"
                id="department-clear"
                class="block w-full px-3 py-2 text-sm font-medium text-red-700 transition-colors hover:bg-red-50 ltr:text-left rtl:text-right"
            >
                Clear
            </button>
        </div>
    </div>

    <button
        type="submit"
        class="ms-2 rounded bg-gray-900 px-3 py-2 text-sm font-medium text-white hover:bg-gray-800"
    >
        Submit
    </button>
</form>

{{-- CONTENTS --}} {{-- CONTENTS --}} {{-- CONTENTS --}} {{-- CONTENTS --}}


<div class="bg-white rounded-lg shadow p-6">

    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Data User Employee</h2>
    </div>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b text-sm text-gray-500">
                <th class="py-2">Nama Employee</th>
                <th class="py-2">Jumlah Aktivitas</th>
                <th class="py-2 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody id="department-list">
            @forelse ($users ?? [] as $user)
                <tr class="border-b text-sm">
                    <td class="py-2">{{ $user->name ?? '—' }}</td>
                    <td class="py-2">{{ $user->activities_count ?? 0 }}</td>
                    <td class="py-2 text-right">
                        @if (isset($user->id))
                            <a href="{{ route('fss.users.show', ['id' => $user->id]) }}" class="text-blue-500">
                                Detail
                            </a>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="py-4 text-center text-sm text-gray-400">
                        No departments found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const wrapper = document.getElementById('department-dropdown');
        const toggle = document.getElementById('department-toggle');
        const menu = document.getElementById('department-menu');
        const input = document.getElementById('department-input');
        const clearBtn = document.getElementById('department-clear');
        const options = document.querySelectorAll('.department-option');

        function openMenu() {
            menu.classList.remove('hidden');
            toggle.setAttribute('aria-expanded', 'true');
        }

        function closeMenu() {
            menu.classList.add('hidden');
            toggle.setAttribute('aria-expanded', 'false');
        }

        function toggleMenu() {
            if (menu.classList.contains('hidden')) {
                openMenu();
            } else {
                closeMenu();
            }
        }

        toggle.addEventListener('click', function (e) {
            e.stopPropagation();
            toggleMenu();
        });

        input.addEventListener('click', function (e) {
            e.stopPropagation();
            toggleMenu();
        });

        options.forEach(function (option) {
            option.addEventListener('click', function () {
                input.value = option.dataset.name;
                closeMenu();
            });
        });

        clearBtn.addEventListener('click', function () {
            input.value = '';
            closeMenu();
        });

        // Close when clicking anywhere outside the dropdown
        document.addEventListener('click', function (e) {
            if (!wrapper.contains(e.target)) {
                closeMenu();
            }
        });

        // Close on Escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closeMenu();
            }
        });
    });
</script>

@endsection