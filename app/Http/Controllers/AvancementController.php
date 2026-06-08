<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Affectation;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AvancementImport;

class AvancementController extends Controller
{
    public function accueil()
    {
        // Load secteurs with a count of related groups or affectations if desired, 
        // or just all secteurs.
        $secteurs = \App\Models\Secteur::orderBy('name')->get();
        return view('accueil', compact('secteurs'));
    }

    public function index(Request $request)
    {
        $query = Affectation::with(['groupe.annee.filiere', 'module', 'formateur']);

        if ($request->filled('secteur_id')) {
            $query->whereHas('groupe.annee.filiere.secteur', function($q) use ($request) {
                $q->where('id', $request->secteur_id);
            });
        }

        if ($request->filled('groupe')) {
            $query->whereHas('groupe', function($q) use ($request) {
                $q->where('name', $request->groupe);
            });
        }

        if ($request->filled('module')) {
            $query->whereHas('module', function($q) use ($request) {
                $q->where('code', $request->module);
            });
        }

        if ($request->filled('formateur')) {
            $query->whereHas('formateur', function($q) use ($request) {
                $q->where('name', $request->formateur);
            });
        }

        if ($request->filled('assignation')) {
            if ($request->assignation === 'assigne') {
                $query->whereHas('formateur', function($q) {
                    $q->where('name', '!=', 'Non Assigné')
                      ->whereNotNull('name');
                });
            } elseif ($request->assignation === 'non_assigne') {
                $query->whereHas('formateur', function($q) {
                    $q->where('name', 'Non Assigné')
                      ->orWhereNull('name');
                });
            }
        }

        $affectations = $query->paginate(10)->onEachSide(2)->withQueryString();

        // Optimized Queries: Use SQL DISTINCT instead of downloading everything to RAM
        $groupes = \App\Models\Groupe::select('name')->distinct()->orderBy('name')->get();
        $modules = \App\Models\Module::select('code', 'name')->distinct()->orderBy('name')->get();
        $formateurs = \App\Models\Formateur::select('name')->distinct()->orderBy('name')->get();
        $secteurs_list = \App\Models\Secteur::select('id', 'name')->orderBy('name')->get();
        
        $secteur = null;
        if ($request->filled('secteur_id')) {
            $secteur = \App\Models\Secteur::find($request->secteur_id);
        }

        return view('index', compact('affectations', 'groupes', 'modules', 'formateurs', 'secteurs_list', 'secteur'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'fichier_excel' => 'required|mimes:xlsx,csv,xls|max:10240', // max 10MB
            'import_data' => 'nullable|boolean',
            'import_avancement' => 'nullable|boolean',
        ]);

        $importData = $request->has('import_data');
        $importAvancement = $request->has('import_avancement');

        if (!$importData && !$importAvancement) {
            return redirect()->route('accueil')->with('error', 'Veuillez sélectionner au moins une option d\'importation (Structure ou Avancement).');
        }

        try {
            Excel::import(new AvancementImport($importData, $importAvancement), $request->file('fichier_excel'));
            return redirect()->route('accueil')->with('success', 'Fichier importé avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('accueil')->with('error', 'Erreur lors de l\'importation: ' . $e->getMessage());
        }
    }
}
