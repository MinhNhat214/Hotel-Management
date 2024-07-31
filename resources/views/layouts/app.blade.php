<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        html{
            scroll-behavior: smooth;
        }
        .text{
            @apply mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48;
        }
        .input{
            @apply bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5;
        }
        .btn-primary{
            @apply text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800
        }
        .btn-delete{
            @apply px-6 py-1 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg dark:bg-red-400 dark:hover:bg-red-700 dark:focus:ring-red-900
        }
        .table-value{
            @apply py-2
        }
        .success{
            @apply flex items-center w-full max-w-xs p-4  bg-green-300 rounded-lg shadow dark:text-gray-400
        }
        .fail{
            @apply flex items-center w-full max-w-xs p-4  bg-red-300 rounded-lg shadow dark:text-gray-400
        }
    </style>
    {{-- blade-formatter-enable --}}

</head>

<body>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="container mx-auto" >
            @include('layouts.navigation')

            <main class="pt-24">
                @yield('content')
            </main>

            @include('layouts.footer')
        </div>
    </div>
</body>

</html>
