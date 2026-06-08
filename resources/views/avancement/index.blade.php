<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AvcPg - Tableau de Bord</title>
    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #fbfbfc; }
        /* Custom Scrollbar for a cleaner look */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #e5e7eb; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #d1d5db; }
    </style>
</head>
<body class="flex h-screen overflow-hidden text-gray-800 antialiased">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col justify-between shrink-0">
        <div>
            <!-- Logo Area -->
            <div class="h-16 flex items-center px-6">
                <div class="flex items-center gap-2 font-bold text-lg tracking-tight">
                    <div class="w-7 h-7 bg-green-500 rounded-md flex items-center justify-center text-white shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    Growin <span class="text-xs text-gray-400 font-normal ml-1">AvcPg</span>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="px-4 py-3">
                <div class="relative">
                    <svg class="w-4 h-4 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" placeholder="Search" class="w-full pl-9 pr-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-shadow placeholder-gray-400">
                    <span class="absolute right-2 top-2 text-[10px] text-gray-400 font-medium border border-gray-200 rounded px-1.5 py-0.5 bg-gray-50">⌘K</span>
                </div>
            </div>

            <!-- Menu Navigation -->
            <div class="px-3 mt-2">
                <p class="px-3 text-[11px] font-semibold text-gray-400 uppercase tracking-wider mb-2">Main menu</p>
                <nav class="space-y-0.5">
                    <a href="#" class="flex items-center gap-3 px-3 py-2 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg font-medium text-sm transition-colors">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg font-medium text-sm transition-colors">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        Transactions
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg font-medium text-sm transition-colors">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Reports
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 text-gray-600 hover:bg-gray-50 hover:text-gray-900 rounded-lg font-medium text-sm transition-colors">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        My Wallet
                    </a>
                </nav>
            </div>

            <!-- Managements Menu -->
            <div class="px-3 mt-6">
                <p class="px-3 text-[11px] font-semibold text-gray-400 uppercase tracking-wider mb-2">Managements</p>
                <nav class="space-y-0.5">
                    <a href="#" class="flex items-center justify-between px-3 py-2 text-gray-600 hover:bg-gray-50 rounded-lg font-medium text-sm transition-colors">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            Compliance
                        </div>
                        <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 text-gray-600 hover:bg-gray-50 rounded-lg font-medium text-sm transition-colors">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Trust center
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 bg-green-50 text-green-700 rounded-lg font-medium text-sm transition-colors relative">
                        <!-- Active indicator line -->
                        <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1 h-5 bg-green-500 rounded-r-full"></div>
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        Invoices (Avancement)
                    </a>
                    <a href="#" class="flex items-center justify-between px-3 py-2 text-gray-600 hover:bg-gray-50 rounded-lg font-medium text-sm transition-colors">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                            Assets
                        </div>
                        <span class="text-[10px] font-bold bg-green-100 text-green-700 px-1.5 py-0.5 rounded">New</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 text-gray-600 hover:bg-gray-50 rounded-lg font-medium text-sm transition-colors">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Personnel
                    </a>
                </nav>
            </div>
        </div>

        <!-- Support Box & Bottom Menu -->
        <div class="p-4">
            <div class="bg-gray-50 border border-gray-100 rounded-xl p-4 mb-4 relative">
                <button class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
                <div class="flex items-center gap-2 font-semibold text-sm text-gray-800 mb-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Need support
                </div>
                <p class="text-xs text-gray-500 mb-3 leading-relaxed">Contact with one of our expert to get support.</p>
                <button class="w-full bg-white border border-gray-200 text-gray-700 text-sm font-semibold py-2 rounded-lg hover:bg-gray-50 transition-colors shadow-sm">
                    Call the Expert
                </button>
            </div>

            <nav class="space-y-0.5">
                <a href="#" class="flex items-center gap-3 px-3 py-2 text-gray-600 hover:bg-gray-50 rounded-lg font-medium text-sm transition-colors">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Settings
                </a>
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-3 py-2 text-gray-600 hover:bg-gray-50 rounded-lg font-medium text-sm transition-colors">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Log out
                    </button>
                </form>
            </nav>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col h-screen overflow-hidden">
        
        <!-- Top Bar (Avatar & Sync) -->
        <div class="h-14 flex justify-end items-center px-8 shrink-0">
            <div class="flex items-center gap-4">
                <button class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                </button>
                <div class="w-8 h-8 rounded-full bg-gray-200 border border-gray-300 overflow-hidden shadow-sm flex items-center justify-center font-bold text-gray-600 text-xs">
                    {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                </div>
            </div>
        </div>

        <!-- Header: Title & Actions -->
        <header class="px-8 flex items-center justify-between shrink-0 mb-6">
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Avancement (Invoices)</h1>
            <div class="flex items-center gap-3">
                <button class="px-4 py-2 text-sm font-semibold text-gray-700 bg-white border border-gray-200 rounded-full hover:bg-gray-50 transition-colors flex items-center gap-2 shadow-sm">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                    Export
                </button>
                <!-- Changing "Create Invoice" to an Upload Trigger to integrate the form gracefully -->
                <label for="excel_upload_input" class="px-5 py-2 text-sm font-semibold text-white bg-green-500 border border-green-500 rounded-full hover:bg-green-600 transition-colors flex items-center gap-2 shadow-sm cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Import Data
                </label>
            </div>
        </header>

        <!-- Hidden Upload Form linked to the button -->
        <form action="{{ route('avancement.import') }}" method="POST" enctype="multipart/form-data" id="upload_form" class="hidden">
            @csrf
            <input type="file" name="fichier_excel" id="excel_upload_input" accept=".xlsx,.xls,.csv" onchange="document.getElementById('upload_form').submit()">
            <input type="hidden" name="import_data" value="1">
            <input type="hidden" name="import_avancement" value="1">
        </form>

        <!-- Scrollable Content Area -->
        <div class="flex-1 overflow-auto px-8 pb-8">
            
            <!-- Gemini AI Analysis Banner -->
            @if(isset($geminiAnalysis))
            <div class="mb-6 bg-white border border-indigo-100 rounded-xl p-4 shadow-sm flex gap-4 items-start">
                <div class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center shrink-0 border border-indigo-100">
                    <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <div>
                    <h3 class="text-sm font-bold text-gray-900 mb-1">AI Analysis / Insights</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $geminiAnalysis }}</p>
                </div>
            </div>
            @endif

            <!-- KPI Cards Row -->
            <div class="grid grid-cols-4 gap-4 mb-6">
                <!-- Card 1 -->
                <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm flex items-start gap-4">
                    <div class="p-2.5 bg-gray-50 rounded-lg border border-gray-100 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1 flex items-center justify-between w-full">Total Affecté <svg class="w-3 h-3 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg></p>
                        <div class="flex items-end gap-2">
                            <h3 class="text-xl font-bold text-gray-900">14,126h</h3>
                            <span class="text-[10px] font-bold bg-yellow-100 text-yellow-700 px-1.5 py-0.5 rounded mb-1">4 pending</span>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm flex items-start gap-4">
                    <div class="p-2.5 bg-gray-50 rounded-lg border border-gray-100 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1 flex items-center justify-between w-full">Total Réalisé <svg class="w-3 h-3 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg></p>
                        <div class="flex items-end gap-2">
                            <h3 class="text-xl font-bold text-gray-900">26,320h</h3>
                            <span class="text-[10px] font-bold bg-green-100 text-green-700 px-1.5 py-0.5 rounded mb-1">+12%</span>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm flex items-start gap-4">
                    <div class="p-2.5 bg-gray-50 rounded-lg border border-gray-100 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1 flex items-center justify-between w-full">Retard Critique <svg class="w-3 h-3 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg></p>
                        <div class="flex items-end gap-2">
                            <h3 class="text-xl font-bold text-gray-900">2,830h</h3>
                            <span class="text-[10px] font-bold bg-red-100 text-red-700 px-1.5 py-0.5 rounded mb-1">2 alert</span>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm flex items-start gap-4">
                    <div class="p-2.5 bg-gray-50 rounded-lg border border-gray-100 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500 mb-1 flex items-center justify-between w-full">Non Assignés <svg class="w-3 h-3 text-gray-300" fill="currentColor" viewBox="0 0 20 20"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg></p>
                        <div class="flex items-end gap-2">
                            <h3 class="text-xl font-bold text-gray-900">2 mods</h3>
                            <span class="text-[10px] font-bold bg-gray-100 text-gray-600 px-1.5 py-0.5 rounded mb-1">Pending</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Filters (Search + Pills) -->
            <div class="flex items-center justify-between mb-4">
                <div class="relative w-80">
                    <svg class="w-4 h-4 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" placeholder="Search by module, groupe, formateur..." class="w-full pl-9 pr-3 py-2 bg-white border border-gray-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-shadow placeholder-gray-400 shadow-sm">
                </div>
                <div class="flex items-center gap-4 bg-white border border-gray-200 rounded-full px-4 py-1.5 shadow-sm text-sm font-medium">
                    <label class="flex items-center gap-1.5 cursor-pointer text-gray-900">
                        <input type="radio" name="filter" class="accent-gray-900 w-3 h-3" checked> All
                    </label>
                    <label class="flex items-center gap-1.5 cursor-pointer text-gray-600 hover:text-gray-900">
                        <span class="w-2 h-2 rounded-full bg-green-400"></span> Achevé
                    </label>
                    <label class="flex items-center gap-1.5 cursor-pointer text-gray-600 hover:text-gray-900">
                        <span class="w-2 h-2 rounded-full bg-yellow-400"></span> En cours
                    </label>
                    <label class="flex items-center gap-1.5 cursor-pointer text-gray-600 hover:text-gray-900">
                        <span class="w-2 h-2 rounded-full bg-red-400"></span> Critique
                    </label>
                </div>
            </div>

            <!-- Data Table -->
            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50/50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Module / Code</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Formateur</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Groupe</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Total MH Affectée</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Total MH Réalisée</th>
                            <th class="px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-sm">
                        @if(isset($affectations))
                            @foreach($affectations as $row)
                                @php
                                    // Calculations as requested
                                    $affecteeP = $row->mh_affectee_presentiel ?? ($row->module->mhp_s1_drif ?? 0);
                                    $affecteeSync = $row->mh_affectee_sync ?? ($row->module->mhsyn_s1_drif ?? 0);
                                    $totalAffectee = $affecteeP + $affecteeSync;
                                    
                                    $realiseeP = $row->mh_realisee_presentiel ?? ($row->mh_realisee_p ?? 0);
                                    $realiseeSync = $row->mh_realisee_sync ?? 0;
                                    $totalRealisee = $realiseeP + $realiseeSync;
                                    
                                    $taux = $totalAffectee > 0 ? ($totalRealisee / $totalAffectee) * 100 : 0;
                                    
                                    // Status Badge Logic
                                    if($taux < 50) {
                                        $badgeBg = 'bg-red-50';
                                        $badgeText = 'text-red-600';
                                        $badgeDot = 'bg-red-400';
                                        $statusLabel = 'Critique';
                                    } elseif($taux < 90) {
                                        $badgeBg = 'bg-yellow-50';
                                        $badgeText = 'text-yellow-700';
                                        $badgeDot = 'bg-yellow-400';
                                        $statusLabel = 'En cours';
                                    } else {
                                        $badgeBg = 'bg-green-50';
                                        $badgeText = 'text-green-600';
                                        $badgeDot = 'bg-green-400';
                                        $statusLabel = 'Achevé';
                                    }

                                    // Avatar logic
                                    $formateurName = $row->formateur->name ?? 'N/A';
                                    $initial = strtoupper(substr($formateurName, 0, 1));
                                    $avatarColors = ['bg-red-500', 'bg-blue-500', 'bg-green-500', 'bg-purple-500', 'bg-yellow-500', 'bg-indigo-500', 'bg-pink-500'];
                                    $avColor = $avatarColors[crc32($formateurName) % count($avatarColors)];
                                @endphp
                                <tr class="hover:bg-gray-50/50 transition-colors group">
                                    <!-- Module -->
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-gray-900">{{ $row->module->code ?? 'N/A' }}</div>
                                        <div class="text-[11px] text-gray-400 mt-0.5 truncate max-w-[200px]" title="{{ $row->module->name ?? '' }}">{{ $row->module->name ?? 'ID ' . $row->module->id }}</div>
                                    </td>
                                    
                                    <!-- Formateur (Client in image) -->
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full {{ $avColor }} text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-sm">
                                                {{ $initial }}
                                            </div>
                                            <div>
                                                <div class="font-medium text-gray-900">{{ $formateurName }}</div>
                                                <div class="text-[11px] text-gray-400">No email on file</div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Groupe -->
                                    <td class="px-6 py-4">
                                        <div class="text-gray-900">{{ $row->groupe->name ?? 'N/A' }}</div>
                                    </td>

                                    <!-- Total MH Affectée -->
                                    <td class="px-6 py-4">
                                        <div class="text-gray-600">{{ number_format($totalAffectee, 2) }} h</div>
                                    </td>

                                    <!-- Total MH Réalisée -->
                                    <td class="px-6 py-4">
                                        <div class="text-gray-600">{{ number_format($totalRealisee, 2) }} h</div>
                                    </td>

                                    <!-- Status -->
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-[11px] font-bold {{ $badgeBg }} {{ $badgeText }}">
                                            <span class="w-1.5 h-1.5 rounded-full {{ $badgeDot }}"></span>
                                            {{ $statusLabel }}
                                        </span>
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-4 text-right">
                                        <button class="text-gray-400 hover:text-gray-900 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 13a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm0-5a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm0 10a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                    Aucune donnée disponible. Importez un fichier Excel pour commencer.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>


                {{-- Custom Pagination Bar --}}
                @if(isset($affectations) && method_exists($affectations, 'hasPages'))
                    {{ $affectations->links('pagination.custom') }}
                @endif
            </div>

        </div>
    </main>
</body>
</html>
