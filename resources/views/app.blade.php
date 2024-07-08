<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" href="{{ asset('moraes-velleda_favicon_16px.png') }}" type="image/png" sizes="16x16"/>
        <link rel="icon" href="{{ asset('moraes-velleda_favicon_32px.png') }}" type="image/png" sizes="32x32"/>
        <link rel="apple-touch-icon" href="{{ asset('moraes-velleda_favicon_60px.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('moraes-velleda_favicon_76px.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('moraes-velleda_favicon_120px.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('moraes-velleda_favicon_152px.png') }}">

        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
