<x-app-layout>
    <x-slot name="headerActions">
        <a href="{{ route('accueil') }}" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800 transition-colors bg-indigo-50 hover:bg-indigo-100 px-4 py-2 rounded-full">
            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Retour à l'accueil
        </a>
    </x-slot>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">
            @if(isset($secteur))
                Détails d'avancement - {{ $secteur->name }}
            @else
                Tous les Avancements
            @endif
        </h1>
        <p class="text-sm text-gray-500 mt-1">Consultez et filtrez les heures prévues et réalisées des groupes.</p>
    </div>

    <!-- Statistics / KPI Dashboard Section -->
    @if(isset($stats))
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-6">
        <!-- KPI Card 1: Avancement Global -->
        <div class="bg-gradient-to-br from-indigo-50 to-indigo-100/50 border border-indigo-100 rounded-xl p-5 shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden group">
            <div class="absolute -right-4 -bottom-4 text-indigo-200/40 transform group-hover:scale-110 transition-transform duration-300">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"></path></svg>
            </div>
            <p class="text-xs font-bold uppercase tracking-wider text-indigo-600 mb-1">Avancement Global</p>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-indigo-900">{{ number_format($stats['percentage'], 1) }}%</span>
            </div>
            <p class="text-xs text-indigo-700/80 mt-2 font-medium">Avancement général des heures réalisées vs prévues.</p>
            <div class="w-full bg-indigo-200/50 rounded-full h-1.5 mt-3 overflow-hidden">
                <div class="bg-indigo-600 h-1.5 rounded-full" style="width: {{ min(100, $stats['percentage']) }}%"></div>
            </div>
        </div>

        <!-- KPI Card 2: Heures Réalisées -->
        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden group">
            <div class="absolute -right-4 -bottom-4 text-gray-100 transform group-hover:scale-110 transition-transform duration-300">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.8 2.8a1 1 0 101.414-1.414L11 9.586V6z" clip-rule="evenodd"></path></svg>
            </div>
            <p class="text-xs font-bold uppercase tracking-wider text-gray-500 mb-1">Volume d'Heures</p>
            <div class="flex items-baseline gap-1.5">
                <span class="text-3xl font-extrabold text-gray-900">{{ number_format($stats['total_realisee'], 1) }}h</span>
                <span class="text-xs text-gray-400 font-semibold">sur {{ number_format($stats['total_prevu'], 1) }}h</span>
            </div>
            <p class="text-xs text-gray-500 mt-2 font-medium">Heures effectuées vs heures programmées.</p>
            <div class="w-full bg-gray-100 rounded-full h-1.5 mt-3 overflow-hidden">
                <div class="bg-emerald-500 h-1.5 rounded-full" style="width: {{ $stats['total_prevu'] > 0 ? min(100, ($stats['total_realisee'] / $stats['total_prevu']) * 100) : 0 }}%"></div>
            </div>
        </div>

        <!-- KPI Card 3: Groupes Suivis -->
        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden group">
            <div class="absolute -right-4 -bottom-4 text-gray-100 transform group-hover:scale-110 transition-transform duration-300">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
            </div>
            <p class="text-xs font-bold uppercase tracking-wider text-gray-500 mb-1">Groupes</p>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-gray-900">{{ $stats['total_groupes'] }}</span>
                <span class="text-xs text-gray-400 font-semibold">groupes</span>
            </div>
            <p class="text-xs text-gray-500 mt-2 font-medium">Nombre total de groupes distincts filtrés.</p>
        </div>

        <!-- KPI Card 4: Formateurs Assignés -->
        <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm hover:shadow-md transition-all duration-300 relative overflow-hidden group">
            <div class="absolute -right-4 -bottom-4 text-gray-100 transform group-hover:scale-110 transition-transform duration-300">
                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
            </div>
            <p class="text-xs font-bold uppercase tracking-wider text-gray-500 mb-1">Formateurs</p>
            <div class="flex items-baseline gap-2">
                <span class="text-3xl font-extrabold text-gray-900">{{ $stats['total_formateurs'] }}</span>
                <span class="text-xs text-gray-400 font-semibold">actifs</span>
            </div>
            <p class="text-xs text-gray-500 mt-2 font-medium">Formateurs affectés sur ces modules.</p>
        </div>
    </div>
    @endif

    <div x-data="viewSettings()" x-init="init()" class="w-full">
        <!-- Filter Form (Collapsible on Mobile, Grid on Desktop) -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm mb-6 p-5">
            <form action="{{ route('avancement.index') }}" method="GET">
                
                @if(isset($secteur))
                    <!-- We are in a specific Secteur: Hide the dropdown, just pass the hidden ID, use 4 cols -->
                    <input type="hidden" name="secteur_id" value="{{ $secteur->id }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
                @else
                    <!-- Vue Globale: Show the dropdown, use 5 cols -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 items-end">
                        <div>
                            <label for="secteur_id" class="block text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wider">Secteur</label>
                            <div class="relative">
                                <select name="secteur_id" id="secteur_id" class="block w-full pl-3 pr-10 py-2.5 text-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 rounded-lg appearance-none bg-white">
                                    <option value="">Tous les secteurs</option>
                                    @if(isset($secteurs_list))
                                        @foreach($secteurs_list as $s)
                                            <option value="{{ $s->id }}" {{ request('secteur_id') == $s->id ? 'selected' : '' }}>{{ $s->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </div>
                            </div>
                        </div>
                @endif

                    <div>
                        <label for="groupe" class="block text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wider">Groupe</label>
                        <div class="relative">
                            <select name="groupe" id="groupe" class="block w-full pl-3 pr-10 py-2.5 text-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 rounded-lg appearance-none bg-white">
                                <option value="">Tous les groupes</option>
                                @foreach($groupes as $g)
                                    <option value="{{ $g->name }}" {{ request('groupe') == $g->name ? 'selected' : '' }}>{{ $g->name }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label for="module" class="block text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wider">Module</label>
                        <div class="relative">
                            <select name="module" id="module" class="block w-full pl-3 pr-10 py-2.5 text-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 rounded-lg appearance-none bg-white">
                                <option value="">Tous les modules</option>
                                @foreach($modules as $m)
                                    <option value="{{ $m->code }}" {{ request('module') == $m->code ? 'selected' : '' }}>{{ $m->code }} - {{ Str::limit($m->name, 30) }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label for="formateur" class="block text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wider">Formateur</label>
                        <div class="relative">
                            <select name="formateur" id="formateur" class="block w-full pl-3 pr-10 py-2.5 text-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 rounded-lg appearance-none bg-white">
                                <option value="">Tous les formateurs</option>
                                @foreach($formateurs as $f)
                                    <option value="{{ $f->name }}" {{ request('formateur') == $f->name ? 'selected' : '' }}>{{ $f->name }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label for="assignation" class="block text-xs font-semibold text-gray-500 mb-1 uppercase tracking-wider">Assignation</label>
                        <div class="relative">
                            <select name="assignation" id="assignation" class="block w-full pl-3 pr-10 py-2.5 text-sm border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 rounded-lg appearance-none bg-white">
                                <option value="">Tous (Assigné / Non Assigné)</option>
                                <option value="assigne" {{ request('assignation') == 'assigne' ? 'selected' : '' }}>Assigné</option>
                                <option value="non_assigne" {{ request('assignation') == 'non_assigne' ? 'selected' : '' }}>Non Assigné</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 flex flex-wrap items-center gap-3 border-t border-gray-100 pt-4">
                    <button type="submit" class="inline-flex items-center px-6 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                        Appliquer les filtres
                    </button>
                    <a href="{{ route('avancement.index', request('secteur_id') ? ['secteur_id' => request('secteur_id')] : []) }}" class="inline-flex items-center px-6 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        Réinitialiser
                    </a>
                </div>
            </form>
        </div>

        <!-- View Controls Bar -->
        <div class="bg-white rounded-xl border border-gray-200 p-4 mb-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4 shadow-sm">
            <!-- Layout Presets (Left Side) -->
            <div class="flex items-center gap-2 flex-wrap">
                <span class="text-xs font-bold text-gray-500 uppercase tracking-wider mr-2">Modèles de vue :</span>
                <div class="inline-flex rounded-lg bg-gray-100 p-1 border border-gray-200">
                    <button @click="setLayout('default')" :class="activeLayout === 'default' ? 'bg-indigo-600 text-white shadow-sm' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'" class="inline-flex items-center px-3.5 py-1.5 rounded-md text-xs font-bold transition-all duration-200">
                        📋 Par Défaut
                    </button>
                    <button @click="setLayout('planning')" :class="activeLayout === 'planning' ? 'bg-indigo-600 text-white shadow-sm' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'" class="inline-flex items-center px-3.5 py-1.5 rounded-md text-xs font-bold transition-all duration-200">
                        📅 Planification (DRIF)
                    </button>
                    <button @click="setLayout('realisation')" :class="activeLayout === 'realisation' ? 'bg-indigo-600 text-white shadow-sm' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'" class="inline-flex items-center px-3.5 py-1.5 rounded-md text-xs font-bold transition-all duration-200">
                        📊 Réalisation
                    </button>
                    <button @click="setLayout('complet')" :class="activeLayout === 'complet' ? 'bg-indigo-600 text-white shadow-sm' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50'" class="inline-flex items-center px-3.5 py-1.5 rounded-md text-xs font-bold transition-all duration-200">
                        👁️ Complet (Tout)
                    </button>
                </div>
            </div>
            
            <!-- Column Dropdown (Right Side) -->
            <div class="relative">
                <button @click="showDropdown = !showDropdown" @click.away="showDropdown = false" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-bold text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all">
                    <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    Colonnes personnalisées
                    <span x-show="activeLayout === 'custom'" class="ml-1.5 bg-indigo-100 text-indigo-800 text-[10px] px-1.5 py-0.5 rounded-full font-extrabold uppercase">Perso</span>
                    <svg class="w-4 h-4 ml-2 text-gray-400 transition-transform duration-200" :class="showDropdown ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                
                <!-- Dropdown Menu -->
                <div x-show="showDropdown" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" x-cloak class="absolute right-0 mt-2 w-72 max-h-[400px] overflow-y-auto bg-white rounded-xl shadow-xl ring-1 ring-black/5 border border-gray-100 z-50 p-4 transition-all duration-200">
                    <div class="flex items-center justify-between border-b border-gray-100 pb-2 mb-2">
                        <span class="text-xs font-bold text-gray-800">Sélection des colonnes</span>
                        <div class="flex gap-2">
                            <button type="button" @click="showAllColumns()" class="text-[10px] font-extrabold text-indigo-600 hover:text-indigo-800">Tout</button>
                            <button type="button" @click="resetColumns()" class="text-[10px] font-extrabold text-gray-500 hover:text-gray-700">Défaut</button>
                        </div>
                    </div>
                    
                    <div class="space-y-1.5">
                        <template x-for="(visible, colName) in columns" :key="colName">
                            <label class="flex items-center gap-2 px-2 py-1.5 rounded-lg hover:bg-indigo-50/50 cursor-pointer transition-colors group">
                                <input type="checkbox" :checked="visible" @change="toggleColumn(colName)" class="w-4 h-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 transition-colors">
                                <span class="text-xs font-semibold text-gray-700 group-hover:text-gray-900" x-text="columnLabels[colName]"></span>
                            </label>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Table Container -->
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden flex flex-col relative" style="max-height: 650px;">
            @if(isset($affectations) && $affectations->count() > 0)
                <div class="overflow-x-auto overflow-y-auto flex-grow custom-scrollbar">
                    <table class="min-w-full divide-y divide-gray-200 text-left border-collapse">
                        <thead class="bg-gray-50/95 backdrop-blur-sm sticky top-0 z-10 shadow-sm">
                            <tr>
                                <th x-show="columns.col_secteur" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Secteur
                                </th>
                                <th x-show="columns.col_filiere" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Filière
                                </th>
                                <th x-show="columns.col_type_formation" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Type Formation
                                </th>
                                <th x-show="columns.col_annee" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Année
                                </th>
                                <th x-show="columns.col_niveau" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Niveau/Option
                                </th>
                                <th x-show="columns.col_groupe" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Groupe
                                </th>
                                <th x-show="columns.col_effectif" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right whitespace-nowrap">
                                    Effectif
                                </th>
                                <th x-show="columns.col_code_module" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Code Module
                                </th>
                                <th x-show="columns.col_module_name" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider w-1/4">
                                    Nom Module
                                </th>
                                <th x-show="columns.col_regional" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Régional
                                </th>
                                <th x-show="columns.col_mhp_s1" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right whitespace-nowrap">
                                    P. S1
                                </th>
                                <th x-show="columns.col_mhsyn_s1" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right whitespace-nowrap">
                                    Sync S1
                                </th>
                                <th x-show="columns.col_mhasyn_s1" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right whitespace-nowrap">
                                    Asyn S1
                                </th>
                                <th x-show="columns.col_mhp_s2" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right whitespace-nowrap">
                                    P. S2
                                </th>
                                <th x-show="columns.col_mhsyn_s2" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right whitespace-nowrap">
                                    Sync S2
                                </th>
                                <th x-show="columns.col_mhasyn_s2" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right whitespace-nowrap">
                                    Asyn S2
                                </th>
                                <th x-show="columns.col_total_prevu" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right whitespace-nowrap">
                                    Prévu (P+Sync)
                                </th>
                                <th x-show="columns.col_formateur" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    Formateur
                                </th>
                                <th x-show="columns.col_realisee_p" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right whitespace-nowrap">
                                    Réalisé P.
                                </th>
                                <th x-show="columns.col_realisee_sync" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right whitespace-nowrap">
                                    Réalisé Sync
                                </th>
                                <th x-show="columns.col_total_realisee" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right whitespace-nowrap">
                                    Réalisé (P+Sync)
                                </th>
                                <th x-show="columns.col_ecart" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider text-right whitespace-nowrap">
                                    Écart (H)
                                </th>
                                <th x-show="columns.col_etat" class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                    État d'Avancement
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($affectations as $aff)
                                @php
                                    $prevueP = ($aff->module->mhp_s1_drif ?? 0) + ($aff->module->mhp_s2_drif ?? 0);
                                    $prevueSync = ($aff->module->mhsyn_s1_drif ?? 0) + ($aff->module->mhsyn_s2_drif ?? 0);
                                    $totalPrevue = $prevueP + $prevueSync;
                                    
                                    $realiseeP = $aff->mh_realisee_p ?? 0;
                                    $realiseeSync = $aff->mh_realisee_sync ?? 0;
                                    $totalRealisee = $realiseeP + $realiseeSync;
                                    
                                    $ecart = $totalRealisee - $totalPrevue;
                                    
                                    $taux = 0;
                                    if($totalPrevue > 0) {
                                        $taux = ($totalRealisee / $totalPrevue) * 100;
                                    }
                                    $barWidth = min(100, $taux);
                                    
                                    // Status styling
                                    if ($taux < 50) {
                                        $barColor = 'bg-red-500';
                                        $pillClass = 'bg-red-100 text-red-800 border-red-200';
                                        $pillText = 'Retard Critique';
                                    } elseif ($taux < 90) {
                                        $barColor = 'bg-yellow-400';
                                        $pillClass = 'bg-yellow-100 text-yellow-800 border-yellow-200';
                                        $pillText = 'En Cours';
                                    } else {
                                        $barColor = 'bg-green-500';
                                        $pillClass = 'bg-green-100 text-green-800 border-green-200';
                                        $pillText = 'Achevé / Bon';
                                    }
                                @endphp
                                <tr class="hover:bg-gray-50/80 transition-colors duration-150">
                                    <!-- Secteur -->
                                    <td x-show="columns.col_secteur" class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm font-bold text-gray-900">{{ $aff->groupe->annee->filiere->secteur->name ?? 'N/A' }}</span>
                                    </td>

                                    <!-- Filière -->
                                    <td x-show="columns.col_filiere" class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900">{{ $aff->groupe->annee->filiere->name ?? 'N/A' }}</div>
                                    </td>

                                    <!-- Type de formation -->
                                    <td x-show="columns.col_type_formation" class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded text-xs font-bold {{ ($aff->groupe->annee->filiere->residentiel ?? false) ? 'bg-blue-50 text-blue-700 border border-blue-100' : 'bg-purple-50 text-purple-700 border border-purple-100' }}">
                                            {{ ($aff->groupe->annee->filiere->residentiel ?? false) ? 'Diplômante' : 'Qualifiante' }}
                                        </span>
                                    </td>

                                    <!-- Année -->
                                    <td x-show="columns.col_annee" class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm font-medium text-gray-900">Année {{ $aff->groupe->annee->annee ?? 'N/A' }}</span>
                                    </td>

                                    <!-- Niveau / Option -->
                                    <td x-show="columns.col_niveau" class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm text-gray-500">{{ $aff->groupe->annee->option ?? 'N/A' }}</span>
                                    </td>

                                    <!-- Groupe -->
                                    <td x-show="columns.col_groupe" class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-gray-100 text-gray-700 border border-gray-200 shadow-sm">
                                            {{ $aff->groupe->name ?? 'N/A' }}
                                        </span>
                                    </td>

                                    <!-- Effectif -->
                                    <td x-show="columns.col_effectif" class="px-6 py-4 whitespace-nowrap text-right">
                                        <span class="text-sm font-extrabold text-gray-900 bg-gray-50 border border-gray-100 px-2 py-1 rounded">{{ $aff->groupe->effectif ?? 0 }}</span>
                                    </td>

                                    <!-- Code Module -->
                                    <td x-show="columns.col_code_module" class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm font-bold text-indigo-900 bg-indigo-50 border border-indigo-100 px-2 py-1 rounded">{{ $aff->module->code ?? 'N/A' }}</span>
                                    </td>

                                    <!-- Nom Module -->
                                    <td x-show="columns.col_module_name" class="px-6 py-4">
                                        <div class="max-w-[300px] truncate" title="{{ $aff->module->name ?? '' }}">
                                            <span class="text-sm text-gray-900 font-medium">{{ $aff->module->name ?? 'N/A' }}</span>
                                        </div>
                                    </td>

                                    <!-- Régional -->
                                    <td x-show="columns.col_regional" class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-xs font-bold px-2 py-0.5 rounded border {{ ($aff->module->regional ?? false) ? 'bg-orange-50 text-orange-700 border-orange-200' : 'bg-gray-50 text-gray-700 border-gray-200' }}">
                                            {{ ($aff->module->regional ?? false) ? 'Oui' : 'Non' }}
                                        </span>
                                    </td>

                                    <!-- Prévu P. S1 -->
                                    <td x-show="columns.col_mhp_s1" class="px-6 py-4 whitespace-nowrap text-right">
                                        <span class="text-sm font-medium text-gray-700">{{ number_format($aff->module->mhp_s1_drif ?? 0, 1) }}h</span>
                                    </td>

                                    <!-- Prévu Sync S1 -->
                                    <td x-show="columns.col_mhsyn_s1" class="px-6 py-4 whitespace-nowrap text-right">
                                        <span class="text-sm font-medium text-gray-700">{{ number_format($aff->module->mhsyn_s1_drif ?? 0, 1) }}h</span>
                                    </td>

                                    <!-- Prévu Asyn S1 -->
                                    <td x-show="columns.col_mhasyn_s1" class="px-6 py-4 whitespace-nowrap text-right">
                                        <span class="text-sm font-medium text-gray-400 italic">{{ number_format($aff->module->mhasyn_s1_drif ?? 0, 1) }}h</span>
                                    </td>

                                    <!-- Prévu P. S2 -->
                                    <td x-show="columns.col_mhp_s2" class="px-6 py-4 whitespace-nowrap text-right">
                                        <span class="text-sm font-medium text-gray-700">{{ number_format($aff->module->mhp_s2_drif ?? 0, 1) }}h</span>
                                    </td>

                                    <!-- Prévu Sync S2 -->
                                    <td x-show="columns.col_mhsyn_s2" class="px-6 py-4 whitespace-nowrap text-right">
                                        <span class="text-sm font-medium text-gray-700">{{ number_format($aff->module->mhsyn_s2_drif ?? 0, 1) }}h</span>
                                    </td>

                                    <!-- Prévu Asyn S2 -->
                                    <td x-show="columns.col_mhasyn_s2" class="px-6 py-4 whitespace-nowrap text-right">
                                        <span class="text-sm font-medium text-gray-400 italic">{{ number_format($aff->module->mhasyn_s2_drif ?? 0, 1) }}h</span>
                                    </td>

                                    <!-- Total Prévu -->
                                    <td x-show="columns.col_total_prevu" class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="text-sm font-bold text-gray-900">{{ number_format($totalPrevue, 1) }}<span class="text-xs font-medium text-gray-500">h</span></div>
                                        <div class="text-[10px] text-gray-400 mt-0.5">P:{{ number_format($prevueP, 1) }} S:{{ number_format($prevueSync, 1) }}</div>
                                    </td>

                                    <!-- Formateur -->
                                    <td x-show="columns.col_formateur" class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            @if($aff->formateur && $aff->formateur->name !== 'Non Assigné')
                                                <div class="h-6 w-6 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 text-xs font-bold mr-2">
                                                    {{ substr($aff->formateur->name, 0, 1) }}
                                                </div>
                                                <span class="text-sm font-semibold text-gray-900">{{ Str::limit($aff->formateur->name, 25) }}</span>
                                            @else
                                                <span class="text-sm text-gray-400 italic">Non assigné</span>
                                            @endif
                                        </div>
                                    </td>

                                    <!-- Réalisé Présentiel -->
                                    <td x-show="columns.col_realisee_p" class="px-6 py-4 whitespace-nowrap text-right">
                                        <span class="text-sm font-medium text-gray-700">{{ number_format($realiseeP, 1) }}h</span>
                                    </td>

                                    <!-- Réalisé Synchrone -->
                                    <td x-show="columns.col_realisee_sync" class="px-6 py-4 whitespace-nowrap text-right">
                                        <span class="text-sm font-medium text-gray-700">{{ number_format($realiseeSync, 1) }}h</span>
                                    </td>

                                    <!-- Total Réalisé -->
                                    <td x-show="columns.col_total_realisee" class="px-6 py-4 whitespace-nowrap text-right">
                                        <div class="text-sm font-bold text-gray-900">{{ number_format($totalRealisee, 1) }}<span class="text-xs font-medium text-gray-500">h</span></div>
                                        <div class="text-[10px] text-gray-400 mt-0.5">P:{{ number_format($realiseeP, 1) }} S:{{ number_format($realiseeSync, 1) }}</div>
                                    </td>

                                    <!-- Écart -->
                                    <td x-show="columns.col_ecart" class="px-6 py-4 whitespace-nowrap text-right">
                                        @if($ecart < 0)
                                            <div class="inline-flex items-center text-sm font-bold text-red-600 bg-red-50 px-2.5 py-0.5 rounded border border-red-100">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                                                {{ number_format(abs($ecart), 1) }}h
                                            </div>
                                        @elseif($ecart > 0)
                                            <div class="inline-flex items-center text-sm font-bold text-green-600 bg-green-50 px-2.5 py-0.5 rounded border border-green-100">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                                                +{{ number_format($ecart, 1) }}h
                                            </div>
                                        @else
                                            <span class="text-sm font-semibold text-gray-400">0.0h</span>
                                        @endif
                                    </td>

                                    <!-- État d'Avancement -->
                                    <td x-show="columns.col_etat" class="px-6 py-4 whitespace-nowrap min-w-[160px]">
                                        <div class="flex justify-between items-end mb-1.5">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider border {{ $pillClass }}">
                                                {{ $pillText }}
                                            </span>
                                            <span class="text-sm font-bold text-gray-900">{{ number_format($taux, 0) }}%</span>
                                        </div>
                                        <div class="w-full bg-gray-100 rounded-full h-2 shadow-inner">
                                            <div class="{{ $barColor }} h-2 rounded-full transition-all duration-700 ease-out" style="width: {{ $barWidth }}%"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination Footer -->
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 relative z-20 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
                    {{ $affectations->links('pagination.custom') }}
                </div>
                
                <style>
                    .custom-scrollbar::-webkit-scrollbar { width: 8px; height: 8px; }
                    .custom-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; }
                    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
                    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
                </style>
            @else
                <div class="text-center py-16 flex-grow flex flex-col justify-center">
                    <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-bold text-gray-900">Aucun Résultat</h3>
                    <p class="mt-1 text-sm text-gray-500">Essayez de modifier vos filtres ou de sélectionner un autre secteur.</p>
                    <div class="mt-6">
                        <a href="{{ route('avancement.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none">
                            Effacer les filtres
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Alpine.js view settings controller -->
    <script>
        function viewSettings() {
            return {
                activeLayout: 'default',
                columns: {
                    col_secteur: false,
                    col_filiere: true,
                    col_type_formation: false,
                    col_annee: true,
                    col_niveau: false,
                    col_groupe: true,
                    col_effectif: false,
                    col_code_module: true,
                    col_module_name: true,
                    col_regional: false,
                    col_mhp_s1: false,
                    col_mhsyn_s1: false,
                    col_mhasyn_s1: false,
                    col_mhp_s2: false,
                    col_mhsyn_s2: false,
                    col_mhasyn_s2: false,
                    col_total_prevu: true,
                    col_formateur: true,
                    col_realisee_p: false,
                    col_realisee_sync: false,
                    col_total_realisee: true,
                    col_ecart: true,
                    col_etat: true
                },
                columnLabels: {
                    col_secteur: 'Secteur',
                    col_filiere: 'Filière',
                    col_type_formation: 'Type de formation',
                    col_annee: 'Année de formation',
                    col_niveau: 'Niveau (Option)',
                    col_groupe: 'Groupe / Code groupe',
                    col_effectif: 'Effectif groupe',
                    col_code_module: 'Code module',
                    col_module_name: 'Nom module',
                    col_regional: 'Régional',
                    col_mhp_s1: 'MH P S1 DRIF',
                    col_mhsyn_s1: 'MH SYN S1 DRIF',
                    col_mhasyn_s1: 'MH ASYN S1 DRIF',
                    col_mhp_s2: 'MH P S2 DRIF',
                    col_mhsyn_s2: 'MH SYN S2 DRIF',
                    col_mhasyn_s2: 'MH ASYN S2 DRIF',
                    col_total_prevu: 'Total Prévu (P+Sync)',
                    col_formateur: 'Formateur',
                    col_realisee_p: 'MH Réalisée Présentiel',
                    col_realisee_sync: 'MH Réalisée Synchrone',
                    col_total_realisee: 'Total Réalisé (P+Sync)',
                    col_ecart: 'Écart (H)',
                    col_etat: 'État d\'Avancement'
                },
                showDropdown: false,
                init() {
                    const savedLayout = localStorage.getItem('avc_active_layout');
                    const savedColumns = localStorage.getItem('avc_visible_columns');
                    
                    if (savedLayout) {
                        this.activeLayout = savedLayout;
                    }
                    if (savedColumns) {
                        try {
                            this.columns = Object.assign({}, this.columns, JSON.parse(savedColumns));
                        } catch(e) {}
                    } else {
                        this.setLayout(this.activeLayout);
                    }
                },
                setLayout(layoutName) {
                    this.activeLayout = layoutName;
                    localStorage.setItem('avc_active_layout', layoutName);
                    
                    const presets = {
                        default: {
                            col_secteur: false,
                            col_filiere: true,
                            col_type_formation: false,
                            col_annee: true,
                            col_niveau: false,
                            col_groupe: true,
                            col_effectif: false,
                            col_code_module: true,
                            col_module_name: true,
                            col_regional: false,
                            col_mhp_s1: false,
                            col_mhsyn_s1: false,
                            col_mhasyn_s1: false,
                            col_mhp_s2: false,
                            col_mhsyn_s2: false,
                            col_mhasyn_s2: false,
                            col_total_prevu: true,
                            col_formateur: true,
                            col_realisee_p: false,
                            col_realisee_sync: false,
                            col_total_realisee: true,
                            col_ecart: true,
                            col_etat: true
                        },
                        planning: {
                            col_secteur: false,
                            col_filiere: true,
                            col_type_formation: false,
                            col_annee: true,
                            col_niveau: false,
                            col_groupe: true,
                            col_effectif: false,
                            col_code_module: true,
                            col_module_name: true,
                            col_regional: true,
                            col_mhp_s1: true,
                            col_mhsyn_s1: true,
                            col_mhasyn_s1: true,
                            col_mhp_s2: true,
                            col_mhsyn_s2: true,
                            col_mhasyn_s2: true,
                            col_total_prevu: true,
                            col_formateur: false,
                            col_realisee_p: false,
                            col_realisee_sync: false,
                            col_total_realisee: false,
                            col_ecart: false,
                            col_etat: false
                        },
                        realisation: {
                            col_secteur: false,
                            col_filiere: true,
                            col_type_formation: false,
                            col_annee: true,
                            col_niveau: false,
                            col_groupe: true,
                            col_effectif: true,
                            col_code_module: true,
                            col_module_name: true,
                            col_regional: false,
                            col_mhp_s1: false,
                            col_mhsyn_s1: false,
                            col_mhasyn_s1: false,
                            col_mhp_s2: false,
                            col_mhsyn_s2: false,
                            col_mhasyn_s2: false,
                            col_total_prevu: false,
                            col_formateur: true,
                            col_realisee_p: true,
                            col_realisee_sync: true,
                            col_total_realisee: true,
                            col_ecart: true,
                            col_etat: true
                        },
                        complet: {
                            col_secteur: true,
                            col_filiere: true,
                            col_type_formation: true,
                            col_annee: true,
                            col_niveau: true,
                            col_groupe: true,
                            col_effectif: true,
                            col_code_module: true,
                            col_module_name: true,
                            col_regional: true,
                            col_mhp_s1: true,
                            col_mhsyn_s1: true,
                            col_mhasyn_s1: true,
                            col_mhp_s2: true,
                            col_mhsyn_s2: true,
                            col_mhasyn_s2: true,
                            col_total_prevu: true,
                            col_formateur: true,
                            col_realisee_p: true,
                            col_realisee_sync: true,
                            col_total_realisee: true,
                            col_ecart: true,
                            col_etat: true
                        }
                    };
                    
                    if (presets[layoutName]) {
                        this.columns = Object.assign({}, presets[layoutName]);
                        localStorage.setItem('avc_visible_columns', JSON.stringify(this.columns));
                    }
                },
                toggleColumn(colName) {
                    this.columns[colName] = !this.columns[colName];
                    this.activeLayout = 'custom';
                    localStorage.setItem('avc_active_layout', 'custom');
                    localStorage.setItem('avc_visible_columns', JSON.stringify(this.columns));
                },
                resetColumns() {
                    this.setLayout('default');
                },
                showAllColumns() {
                    this.setLayout('complet');
                }
            };
        }
    </script>
</x-app-layout>
