<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <script src="https://unpkg.com/vue@next"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />



        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .table-product {
                border: 1px solid;
                width: 100%;
                text-align: center;
            }

            .table-product td {
                border: 1px solid;
                padding: 10px;
                width: 25%;
            }
            .pagination-wrap {
                margin-top: 40px;
            }

            .pagination-wrap .pagination{
                display: flex;
            }

            .pagination ul{
                display: flex;
                margin: 0 auto;
            }
            
            .pagination a, .pagination span {
                 background:  #000000;
                 padding: 15px;
                 margin-right: 10px;
                 border-radius: 10px;
                 color: white;

            }
            
            .pagination .active-link {
                 background: #6E33FF;
            }

        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
