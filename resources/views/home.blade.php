<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <h1 class="text-3xl font-bold underline">
            {{ __('page/home.welcome', ['app_name' => config('app.name')]) }}
        </h1>
    </body>
</html>
