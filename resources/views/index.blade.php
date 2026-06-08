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

    <!-- Data Table Container -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden flex flex-col relative" style="max-height: calc(100vh - 250px);">
        @if(isset($affectations) && $affectations->count() > 0)
            <div class="overflow-x-auto overflow-y-auto flex-grow custom-scrollbar">
                <table class="min-w-full divide-y divide-gray-200 text-left border-collapse">
                    <thead class="bg-gray-50/95 backdrop-blur-sm sticky top-0 z-10 shadow-sm">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                Filière/Année
                            </th>
                            <th scope="col" class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                Groupe
                            </th>
                            <th scope="col" class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider w-1/4">
                                Module
                            </th>
                            <th scope="col" class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                Formateur
                            </th>
                            <th scope="col" class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right whitespace-nowrap">
                                Prévu (P+Sync)
                            </th>
                            <th scope="col" class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right whitespace-nowrap">
                                Réalisé (P+Sync)
                            </th>
                            <th scope="col" class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right whitespace-nowrap">
                                Écart (H)
                            </th>
                            <th scope="col" class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider whitespace-nowrap">
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
                                <!-- Filière/Année -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-gray-900">{{ $aff->groupe->annee->filiere->name ?? 'N/A' }}</div>
                                    <div class="text-xs text-gray-500 mt-0.5">Année: {{ $aff->groupe->annee->annee ?? '' }}</div>
                                </td>

                                <!-- Groupe -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-gray-100 text-gray-700 border border-gray-200 shadow-sm">
                                        {{ $aff->groupe->name ?? 'N/A' }}
                                    </span>
                                </td>
                                
                                <!-- Module -->
                                <td class="px-6 py-4">
                                    <div class="min-w-[200px] max-w-[300px]">
                                        <p class="text-sm font-bold text-indigo-900 truncate" title="{{ $aff->module->code ?? 'N/A' }}">{{ $aff->module->code ?? 'N/A' }}</p>
                                        <p class="text-xs text-gray-500 truncate mt-0.5" title="{{ $aff->module->name ?? '' }}">{{ Str::limit($aff->module->name ?? '', 45) }}</p>
                                    </div>
                                </td>
                                
                                <!-- Formateur -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($aff->formateur && $aff->formateur->name !== 'Non Assigné')
                                            <div class="h-6 w-6 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 text-xs font-bold mr-2">
                                                {{ substr($aff->formateur->name, 0, 1) }}
                                            </div>
                                            <span class="text-sm font-medium text-gray-900">{{ Str::limit($aff->formateur->name, 20) }}</span>
                                        @else
                                            <span class="text-sm text-gray-400 italic">Non assigné</span>
                                        @endif
                                    </div>
                                </td>
                                
                                <!-- Prévu -->
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="text-sm font-bold text-gray-900">{{ number_format($totalPrevue, 1) }}<span class="text-xs font-medium text-gray-500">h</span></div>
                                    <div class="text-[10px] text-gray-400 mt-0.5">P:{{ number_format($prevueP, 1) }} S:{{ number_format($prevueSync, 1) }}</div>
                                </td>

                                <!-- Réalisé -->
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <div class="text-sm font-bold text-gray-900">{{ number_format($totalRealisee, 1) }}<span class="text-xs font-medium text-gray-500">h</span></div>
                                    <div class="text-[10px] text-gray-400 mt-0.5">P:{{ number_format($realiseeP, 1) }} S:{{ number_format($realiseeSync, 1) }}</div>
                                </td>

                                <!-- Écart -->
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    @if($ecart < 0)
                                        <div class="inline-flex items-center text-sm font-bold text-red-600 bg-red-50 px-2 py-0.5 rounded">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                                            {{ number_format(abs($ecart), 1) }}h
                                        </div>
                                    @elseif($ecart > 0)
                                        <div class="inline-flex items-center text-sm font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                                            +{{ number_format($ecart, 1) }}h
                                        </div>
                                    @else
                                        <span class="text-sm font-medium text-gray-400">0.0h</span>
                                    @endif
                                </td>
                                
                                <!-- État d'Avancement -->
                                <td class="px-6 py-4 whitespace-nowrap min-w-[160px]">
                                    <div class="flex justify-between items-end mb-1.5">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider border {{ $pillClass }}">
                                            {{ $pillText }}
                                        </span>
                                        <span class="text-sm font-bold text-gray-900">{{ number_format($taux, 0) }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-100 rounded-full h-2 shadow-inner">
                                        <div class="{{ $barColor }} h-2 rounded-full transition-all duration-1000 ease-out" style="width: {{ $barWidth }}%"></div>
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
                <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun Résultat</h3>
                <p class="mt-1 text-sm text-gray-500">Essayez de modifier vos filtres ou de sélectionner un autre secteur.</p>
                <div class="mt-6">
                    <a href="{{ route('avancement.index') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none">
                        Effacer les filtres
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
