<?php

 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Vehicule;
use App\Models\Prestataire;
use App\Models\Type_maintenance;
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
        $typesMaintenance = Type_maintenance::all();
        // Vous pouvez ajouter du code supplémentaire si nécessaire
        return view('pages.maintenances.formulaire', compact('vehicules','prestataires','typesMaintenance'));
    }
   
    public function store(Request $request)
    {
    
        $request->validate([
            'id_vehicule' => 'required',
            'id_prestataire' => 'required',
            'numero_facture' => 'required',
            'cout' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'id_type_maintenance' => 'required',
            'travaux' => 'required',
            'statut' => 'required',
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
        return view('pages.maintenances.edit', compact('maintenance','vehicules','prestataires'));
    }

    public function update(Request $request, Maintenance $maintenance)
    {
        $request->validate([
            'id_vehicule' => 'required',
            'id_prestataire' => 'required',
            'numero_facture' => 'required',
            'cout' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'id_type_maintenance' => 'required',
            'travaux' => 'required',
            'statut' => 'required',
        ]);

        $maintenance->update($request->all());

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
