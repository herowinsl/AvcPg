<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Tailwind CDN (Bypassing Vite) -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Styles -->
        @livewireStyles
        <style>
            body { 
                font-family: 'Outfit', sans-serif !important; 
                background-color: #f9fafb !important; 
                color: #111827 !important; 
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        {{ $slot }}

        @livewireScripts
    </body>
</html>
