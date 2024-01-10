<?php

 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Vehicule;
use App\Models\Prestataire;
use App\Models\Categorie;
class MaintenanceController extends Controller
{
    public function list()
    {
        $maintenances = Maintenance::all();
        return view('pages.maintenances.list', compact('maintenances'));
    }

    public function formulaire()
    {
        $vehicules = Vehicule::all();
        $prestataires = Prestataire::all();
        $categories= Categorie::all();
        // Vous pouvez ajouter du code supplémentaire si nécessaire
        return view('pages.maintenances.formulaire', compact('vehicules','prestataires','categories'));
    }
   
    public function store(Request $request)
    {
    
        $request->validate([
            'id_vehicule' => 'required|exists:vehicules,id_vehicule',
            'id_prestataire' => 'required|exists:prestataires,id_prestataire',
            'type' => 'required|string',
            'numero_facture' => 'required|string',
            'cout' => 'required|integer',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',           
            'travaux' => 'required|text',
            'statut' => 'required|string',
        ]);

        Maintenance::create($request->all());

        return redirect()->route('maintenances.formulaire')
                         ->with('success', 'Maintenance ajoutée avec succès');
    }

    public function show(Maintenance $maintenance)
    {
        return view('maintenances.show', compact('maintenance'));
    }

    public function edit(Maintenance $maintenance)
    {
        $vehicules = Vehicule::all();
        $prestataires = Prestataire::all();
        $categories = Categorie::all();
        return view('pages.maintenances.edit', compact('maintenance','vehicules','prestataires','categories'));
    }

    public function update(Request $request, Maintenance $maintenance)
    {
        $request->validate([
            'id_vehicule' => 'nullable|exists:vehicules,id_vehicule',
            'id_prestataire' => 'nullable|exists:prestataires,id_prestataire',
            'type' => 'nullable|string',
            'numero_facture' => 'nullable|string',
            'cout' => 'nullable|integer',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'travaux' => 'nullable|string',
            'statut' => 'nullable|string',
            
        ]);
        $maintenance->fill(['id_vehicule' => $request->input('id_vehicule')]);
        $maintenance->fill(['id_prestataire' => $request->input('id_prestataire')]);
        $maintenance->fill(['type' => $request->input('type')]);
        $maintenance->fill(['numero_facture' => $request->input('numero_facture')]);
        $maintenance->fill(['cout' => $request->input('cout')]);
        $maintenance->fill(['date_debut' => $request->input('date_debut')]);
        $maintenance->fill(['date_fin' => $request->input('date_fin')]);
        $maintenance->fill(['travaux' => $request->input('travaux')]);
        $maintenance->fill(['statut' => $request->input('statut')]);
        $maintenance->save();
        
        return redirect()->route('maintenances.list')
                         ->with('success', 'Maintenance mise à jour avec succès');
    }

    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();

        return redirect()->route('maintenances.list')
                         ->with('success', 'Maintenance supprimée avec succès');
    }
}
