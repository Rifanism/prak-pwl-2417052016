@props([
    'title' => null,
    'description' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ? $title . ' — ' . config('institution.name') : config('institution.name') }}</title>

        @if ($description)
            <meta name="description" content="{{ $description }}">
        @endif

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>

    <body>
        <div class="site-shell">
            <x-navbar />

            <main class="container-page flex-1">
                {{ $slot }}
            </main>

            <x-footer />
        </div>
    </body>
</html>
