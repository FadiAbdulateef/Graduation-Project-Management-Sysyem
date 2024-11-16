<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{!! asset('images/favicon.ico') !!}" />
    <title>{{ config('app.name', 'SPMS') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{URL::asset('js/cdn.min.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('css/all.min.css')  }}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="font-sans antialiased scrollbar-thin scrollbar-track-transparent scrollbar-thumb-gray-800 text-gray-800">
<div class="min-h-screen bg-gray-200">
    @include('layouts.navigation')
    @props(['filters'=>''])
    <!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto h-24 py-6 flex justify-between items-center px-4">
            {{ $header }}
        </div>
    </header>

    <!-- Page Content -->
    @if ($filters)
        <div class="flex flex-wrap space-y-2 justify-center items-center sm:space-x-4 py-6 md:space-y-0">
            {{ $filters }}
        </div>
    @endif
    <main x-cloak x-data="{ showmain: false }" x-init="() => {
                setTimeout(() => showmain = true, 200);
            }" x-show="showmain" x-transition:enter="transition ease-out duration-300"
          x-transition:enter-start="opacity-0 transform scale-90">
        {{ $slot }}
    </main>
</div>
</body>
<x-footer />

</html>
