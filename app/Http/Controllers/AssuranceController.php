<?php

// AssuranceController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assurance;
use App\Models\Vehicule;

class AssuranceController extends Controller
{
    public function list()
    {
        $assurances = Assurance::all();
        $vehicules = Vehicule::all();
        return view('pages.assurances.list', compact('assurances','vehicules'));
    }

    public function formulaire()
    {
        $vehicules = Vehicule::all();
        return view('pages.assurances.formulaire', compact('vehicules'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_assurance' => 'nullable|string',
            'type_assurance' => 'required|string',
            'id_vehicule' => 'required|exists:vehicules,id_vehicule',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'statut' => 'required|string',
            'jours_restant' => 'required|integer',
        ]);

        Assurance::create($validatedData);

        return redirect()->route('assurances.list')->with('success', 'Assurance créée avec succès.');
    }

    public function show(Assurance $assurance)
    {
        return view('assurances.show', compact('assurance'));
    }

    public function edit(Assurance $assurance)
    {
        $vehicules = Vehicule::all();
        return view('pages.assurances.edit', compact('assurance', 'vehicules'));
    }

    public function update(Request $request, Assurance $assurance)
    {
        $validatedData = $request->validate([
            'nom_assurance' => 'nullable|string',
            'type_assurance' => 'required|string',
            'id_vehicule' => 'required|exists:vehicules,id_vehicule',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'statut' => 'required|string',
            'jours_restant' => 'required|integer',
        ]);

        $assurance->update($validatedData);

        return redirect()->route('assurances.list')->with('success', 'Assurance mise à jour avec succès.');
    }

    public function destroy(Assurance $assurance)
    {
        $assurance->delete();

        return redirect()->route('assurances.list')->with('success', 'Assurance supprimée avec succès.');
    }
}
