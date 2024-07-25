<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html{
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <main class="pt-24">
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
</body>
</html>
