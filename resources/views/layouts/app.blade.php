<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Employee Activity Tracker')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="flex bg-white shadow px-6 py-4 mb-6 justify-between">
        <h1 class="text-lg font-semibold text-gray-800">Employee Activity Tracker</h1>
        <div class="flex gap-5 items-center">
            <a href="{{ route('departments.index') }}">Departments</a>
            <a href="{{ route('categories-activities.index') }}">Activity Categories</a>
            <a href="{{ route('users.index') }}">Users</a>
            <a href="/" class="bg-black text-white px-4 py-2 rounded hover:bg-slate-800">
                Login
            </a>
            <a href="/" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-700">
                Register
            </a>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4">
        @yield('content')
    </main>

</body>
</html>