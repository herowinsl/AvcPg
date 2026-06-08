<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'AvcPg') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Tailwind CDN (Bypassing Vite) -->
        <script src="https://cdn.tailwindcss.com"></script>
        
        <!-- Alpine.js (for dropdowns/modals) -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Styles -->
        @livewireStyles
        <style>
            body {
                font-family: 'Inter', sans-serif !important;
                background-color: #f9fafb !important;
                color: #111827 !important;
            }
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="antialiased min-h-screen flex flex-col">
        <x-banner />

        <div class="flex flex-col flex-grow w-full max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header Unifié -->
            <header class="flex justify-between items-center mb-8">
                <div class="flex items-center gap-4">
                    <div>
                        <a href="{{ route('accueil') }}" class="text-2xl font-bold text-gray-900 hover:text-indigo-600 transition-colors">
                            AvcPg
                        </a>
                        <p class="text-sm text-gray-500">Suivi d'Avancement Programme</p>
                    </div>
                </div>
                
                @auth
                <div class="flex items-center gap-4">
                    {{ $headerActions ?? '' }}

                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center gap-2 bg-white border border-gray-200 rounded-full py-1 px-1 pr-4 shadow-sm hover:shadow-md transition-shadow focus:outline-none">
                            <div class="w-8 h-8 bg-indigo-100 text-indigo-700 rounded-full flex items-center justify-center font-bold text-sm">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>

                        <div x-show="open" @click.away="open = false" x-cloak
                             class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5 z-50 transition transform origin-top-right">
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mon Profil</a>
                            <form method="POST" action="{{ route('logout') }}" class="m-0">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                    Déconnexion
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endauth
            </header>

            <!-- Alerts -->
            @if(session('success'))
                <div class="mb-6 rounded-md bg-green-50 p-4 border border-green-200 shadow-sm transition-all">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" /></svg>
                        </div>
                        <div class="ml-3"><p class="text-sm font-medium text-green-800">{{ session('success') }}</p></div>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 rounded-md bg-red-50 p-4 border border-red-200 shadow-sm transition-all">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" /></svg>
                        </div>
                        <div class="ml-3"><p class="text-sm font-medium text-red-800">{{ session('error') }}</p></div>
                    </div>
                </div>
            @endif

            <!-- Page Content -->
            <main class="flex-grow">
                {{ $slot }}
            </main>
            
            <!-- Footer -->
            <footer class="mt-auto border-t border-gray-200 pt-8 pb-4">
                <div class="text-center text-sm text-gray-500 font-medium">
                    &copy; 2026 OFPPT CMC BMK. Tous droits réservés.
                </div>
            </footer>
        </div>

        @stack('modals')
        @livewireScripts
    </body>
</html>
