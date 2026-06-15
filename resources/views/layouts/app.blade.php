<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClinicBook</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center shadow-sm">
        <div class="flex items-center gap-2">
            <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
            <span class="text-xl font-bold text-teal-700">ClinicBook</span>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-gray-600 text-sm">{{ auth()->user()->name }}</span>
            <span class="bg-teal-100 text-teal-700 text-xs px-2 py-1 rounded-full font-medium">{{ ucfirst(auth()->user()->role) }}</span>
            <form method="POST" action="/logout">
                @csrf
                <button class="text-sm text-gray-500 hover:text-red-600">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Main -->
    <main class="max-w-6xl mx-auto px-6 py-8">
        @yield('content')
    </main>

</body>
</html>