<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Secteur;
use App\Models\Filiere;
use App\Models\Annee;
use App\Models\Groupe;
use App\Models\Module;
use App\Models\Formateur;
use App\Models\Affectation;
use Illuminate\Support\Facades\DB;

class AvancementImport implements ToCollection, WithHeadingRow
{
    protected $importData;
    protected $importAvancement;

    public function __construct(bool $importData = true, bool $importAvancement = true)
    {
        $this->importData = $importData;
        $this->importAvancement = $importAvancement;
    }

    public function collection(Collection $rows)
    {
        DB::transaction(function () use ($rows) {
            foreach ($rows as $row) {
                $normalizedRow = [];
                foreach ($row as $key => $value) {
                    if (is_string($key)) {
                        $cleanKey = str_replace(
                            ['é','è','ê','ë','à','â','î','ï','ô','ö','ù','û','ü','ç'],
                            ['e','e','e','e','a','a','i','i','o','o','u','u','u','c'],
                            mb_strtolower($key)
                        );
                        $cleanKey = preg_replace('/[^a-z0-9]/', '', $cleanKey);
                        $normalizedRow[$cleanKey] = $value;
                    }
                }

                // Extracted values
                $secteurName = $normalizedRow['secteur'] ?? 'N/A';
                $filiereName = $normalizedRow['codefiliere'] ?? $normalizedRow['filiere'] ?? 'N/A';
                $anneeRaw = $normalizedRow['anneedeformation'] ?? $normalizedRow['annee'] ?? '1';
                $anneeNumber = preg_replace('/[^1-3]/', '', $anneeRaw);
                $anneeName = empty($anneeNumber) ? '1' : $anneeNumber[0];
                
                $optionName = $normalizedRow['niveau'] ?? null;
                $groupeName = $normalizedRow['groupe'] ?? $normalizedRow['codegroupe'] ?? 'N/A';
                $moduleCode = $normalizedRow['codemodule'] ?? 'N/A';
                $formateurMatricule = $normalizedRow['mleaffectepresentielactif'] ?? 'N/A';
                
                // We'll use the Presentiel Formateur for the single formateur_id
                
                if ($this->importData) {
                    // 1. Secteur
                    $secteur = Secteur::firstOrCreate(
                        ['name' => $secteurName]
                    );

                    // 2. Filiere
                    $isResidentiel = isset($normalizedRow['typedeformation']) && str_contains(strtolower($normalizedRow['typedeformation']), 'dipl') ? true : false;
                    $filiere = Filiere::firstOrCreate(
                        ['name' => $filiereName],
                        [
                            'secteur_id' => $secteur->id,
                            'residentiel' => $isResidentiel,
                        ]
                    );

                    // 3. Annee
                    $annee = Annee::firstOrCreate(
                        ['filiere_id' => $filiere->id, 'annee' => $anneeName],
                        ['option' => $optionName]
                    );

                    // 4. Groupe
                    $groupe = Groupe::firstOrCreate(
                        ['name' => $groupeName],
                        [
                            'filiere_id' => $filiere->id,
                            'annee_id' => $annee->id,
                            'effectif' => intval($normalizedRow['effectifgroupe'] ?? 0),
                        ]
                    );

                    // 5. Module
                    $isRegional = isset($normalizedRow['regional']) && strtolower($normalizedRow['regional']) === 'oui' ? true : false;
                    $module = Module::firstOrCreate(
                        ['code' => $moduleCode],
                        [
                            'annee_id' => $annee->id,
                            'name' => $normalizedRow['module'] ?? null,
                            'regional' => $isRegional,
                            'mhp_s1_drif' => floatval(str_replace(',', '.', $normalizedRow['mhps1drif'] ?? 0)),
                            'mhsyn_s1_drif' => floatval(str_replace(',', '.', $normalizedRow['mhsyns1drif'] ?? 0)),
                            'mhasyn_s1_drif' => floatval(str_replace(',', '.', $normalizedRow['mhasyns1drif'] ?? 0)),
                            'mhp_s2_drif' => floatval(str_replace(',', '.', $normalizedRow['mhps2drif'] ?? 0)),
                            'mhsyn_s2_drif' => floatval(str_replace(',', '.', $normalizedRow['mhsyns2drif'] ?? 0)),
                            'mhasyn_s2_drif' => floatval(str_replace(',', '.', $normalizedRow['mhasyns2drif'] ?? 0)),
                        ]
                    );

                    // 6. Formateur
                    $formateurName = $normalizedRow['formateuraffectepresentielactif'] ?? null;
                    if (!$formateurName || $formateurName === 'N/A' || trim($formateurName) === '') {
                        $formateurName = 'Non Assigné';
                    }
                    
                    $formateur = Formateur::firstOrCreate(
                        ['name' => $formateurName],
                        [
                            'secteur_id' => $secteur->id,
                        ]
                    );
                } else {
                    $secteur = Secteur::where('name', $secteurName)->first();
                    $filiere = Filiere::where('name', $filiereName)->first();
                    $annee = Annee::where('annee', $anneeName)->first();
                    $groupe = Groupe::where('name', $groupeName)->first();
                    $module = Module::where('code', $moduleCode)->first();
                    
                    $formateurName = $normalizedRow['formateuraffectepresentielactif'] ?? null;
                    if (!$formateurName || $formateurName === 'N/A' || trim($formateurName) === '') {
                        $formateurName = 'Non Assigné';
                    }
                    $formateur = Formateur::where('name', $formateurName)->first();

                    if (!$groupe || !$module) {
                        continue;
                    }
                }

                if ($this->importAvancement) {
                    Affectation::updateOrCreate(
                        [
                            'groupe_id' => $groupe->id,
                            'module_id' => $module->id,
                            'formateur_id' => $formateur->id,
                        ],
                        [
                            'mh_realisee_p' => floatval(str_replace(',', '.', $normalizedRow['mhrealiseepresentiel'] ?? 0)),
                            'mh_realisee_sync' => floatval(str_replace(',', '.', $normalizedRow['mhrealiseesync'] ?? 0)),
                        ]
                    );
                } else {
                    Affectation::firstOrCreate(
                        [
                            'groupe_id' => $groupe->id,
                            'module_id' => $module->id,
                            'formateur_id' => $formateur->id,
                        ]
                    );
                }
            }
        });
    }
}
