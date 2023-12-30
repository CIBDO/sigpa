<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule;
use App\Models\Modele;
use App\Models\Marque;
use Illuminate\Support\Facades\DB;

class VehiculeController extends Controller
{
   

    public function list()
    {
        $vehicules = Vehicule::all();
        return view('pages.vehicules.list', compact('vehicules'));
    }
    public function formulaire()
    {
        $modeles = Modele::all();
        $marques = Marque::all();
        return view('pages.vehicules.formulaire', compact( 'modeles', 'marques'));
    }
    public function detail($id_vehicule)
    {
        // Récupérez le véhicule en utilisant l'identifiant
        $vehicule = Vehicule::findOrFail($id_vehicule);

        // Passez les données du véhicule à la vue
        return view('pages.vehicules.detail', ['vehicule' => $vehicule]);
    }


public function store(Request $request)
{
    $request->validate([
        'immatriculation' => 'required|string',
        'date_immatriculation' => 'required|date',
        'etat_vehicule' => 'required|string',
        'numero_chasis' => 'required|string',
        'date_circulation' => 'required|date',
        'utilite' => 'required|string',
        'statut' => 'required|string',
        'id_modele' => 'required|exists:modeles,id_modele',
        'id_marque' => 'required|exists:marques,id_marque',
        'energie' => 'required|string',
        'date_acquisition' => 'required|date',
    ]);

    Vehicule::create($request->all());

    return redirect()->route('vehicules.formulaire')
        ->with('success', 'Véhicule ajouté avec succès');
}

    public function edit(Vehicule $vehicule)
    {
       
        $modeles = Modele::all();
        $marques = Marque::all();
        return view('pages.vehicules.edit', compact('vehicule', 'modeles', 'marques'));
    }

    public function update(Request $request, Vehicule $vehicule)
    {
        $request->validate([
            'immatriculation' => 'nullable|string',
            'date_immatriculation' => 'nullable|date',
            'etat_vehicule' => 'nullable|string',
            'numero_chasis' => 'nullable|string',
            'date_circulation' => 'nullable|date',
            'utilite' => 'nullable|string',
            'statut' => 'nullable|string',
            'id_modele' => 'nullable|exists:modeles,id_modele',
            'id_marque' => 'nullable|exists:marques,id_marque',
            'energie' => 'nullable|string',
            'date_acquisition' => 'required|date',
        ]);

        $vehicule->update($request->all());

        return redirect()->route('vehicules.list')
            ->with('success', 'Véhicule modifié avec succès');
    }

    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();

        return redirect()->route('vehicules.list')
            ->with('success', 'Véhicule supprimé avec succès');
    }
}
