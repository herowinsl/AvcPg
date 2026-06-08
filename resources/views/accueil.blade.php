<x-app-layout>
    <x-slot name="headerActions">
        <button onclick="document.getElementById('importModal').classList.remove('hidden')" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all hover:shadow-lg">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
            Mettre à jour
        </button>
    </x-slot>

    <!-- Secteurs Grid -->
    <div>
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-900">Secteurs de Formation</h2>
            <span class="text-sm font-medium text-gray-500 bg-white px-3 py-1 rounded-full border border-gray-200 shadow-sm">{{ isset($secteurs) ? $secteurs->count() : 0 }} Secteurs</span>
        </div>
        
        @if(isset($secteurs) && $secteurs->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- View All Card (Featured first) -->
                <a href="{{ route('avancement.index') }}" class="group block bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl border border-transparent shadow-md hover:shadow-xl hover:-translate-y-1 transition-all duration-300 overflow-hidden flex flex-col items-center justify-center text-center p-6 min-h-[200px] relative">
                    <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-10 transition-opacity"></div>
                    <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-white tracking-wide">Vue Globale</h3>
                    <p class="text-sm text-indigo-100 mt-2 font-medium">Tous les secteurs & avancements</p>
                </a>

                @foreach($secteurs as $secteur)
                    <a href="{{ route('avancement.index', ['secteur_id' => $secteur->id]) }}" class="group block bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-lg hover:border-indigo-300 hover:-translate-y-1 transition-all duration-300 overflow-hidden relative">
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-indigo-500 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center group-hover:bg-indigo-100 group-hover:rotate-3 transition-all duration-300">
                                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                                <span class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 group-hover:text-indigo-600 group-hover:bg-indigo-50 transition-colors">
                                    <svg class="w-4 h-4 translate-x-0 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 mb-1 line-clamp-1" title="{{ $secteur->name }}">{{ $secteur->name }}</h3>
                            <p class="text-sm text-gray-500 flex items-center">
                                Consulter les détails
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-2xl border border-gray-200 shadow-sm flex flex-col items-center justify-center">
                <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                    <svg class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h3 class="mt-2 text-lg font-bold text-gray-900">Aucune donnée disponible</h3>
                <p class="mt-2 text-sm text-gray-500 max-w-sm mx-auto">Votre base de données est vide. Veuillez importer un fichier Excel pour générer vos secteurs et tableaux de bord.</p>
                <button onclick="document.getElementById('importModal').classList.remove('hidden')" class="mt-6 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                    Importer maintenant
                </button>
            </div>
        @endif
    </div>

    <!-- Import Modal -->
    <div id="importModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="document.getElementById('importModal').classList.add('hidden')"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-gray-100">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                                <h3 class="text-lg font-bold leading-6 text-gray-900" id="modal-title">Mettre à jour les données</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 mb-4">Importez un nouveau fichier Excel pour mettre à jour la structure et l'avancement des groupes.</p>
                                    
                                    <form id="importForm" action="{{ route('avancement.import') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="fichier_excel" class="block text-xs font-semibold text-gray-700 mb-1">Fichier Source (.xlsx, .csv)</label>
                                            <input type="file" name="fichier_excel" id="fichier_excel" accept=".xlsx,.xls,.csv" required
                                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 border border-gray-300 rounded-md bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                                        </div>
                                        
                                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 flex flex-col gap-3">
                                            <label class="flex items-center gap-3 cursor-pointer group">
                                                <input type="checkbox" name="import_data" value="1" checked class="w-5 h-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 transition-colors">
                                                <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Importer la Structure (Secteurs, Filières, Groupes)</span>
                                            </label>
                                            <label class="flex items-center gap-3 cursor-pointer group">
                                                <input type="checkbox" name="import_avancement" value="1" checked class="w-5 h-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 transition-colors">
                                                <span class="text-sm font-medium text-gray-700 group-hover:text-gray-900">Importer l'Avancement (Heures réalisées)</span>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 border-t border-gray-200">
                        <button type="submit" form="importForm" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 sm:ml-3 sm:w-auto">
                            Lancer l'importation
                        </button>
                        <button type="button" onclick="document.getElementById('importModal').classList.add('hidden')" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                            Annuler
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
