<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="bg-gray-800 py-3">
        <h3 class="text-white text-center text-2xl font-bold">Simple Laravel 11 CRUD</h3>
    </div>

    <main class="bg-gray-100 flex justify-center h-screen">
        @yield('content')
    </main>
</body>

</html>