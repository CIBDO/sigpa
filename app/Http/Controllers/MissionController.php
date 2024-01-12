<?php

namespace App\Http\Controllers;

use App\helpers\MyNotifications;
use App\helpers\Notifications;
use HepplerDotNet\FlashToastr\Flash;
use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Vehicule;
use Illuminate\Support\Facades\DB;


class MissionController extends Controller
{

    public function list()
    {
        dd(MyNotifications::carToMaintain());
        Flash::success('Confirmation','Mission confirmée');
        $missions = Mission::all(); // Remplacez cela par votre logique pour récupérer les missions
        $vehicules = Vehicule::all(); // Remplacez cela par votre logique pour récupérer les véhicules

    return view('pages.missions.list', ['missions' => $missions, 'véhicules' => $vehicules]);
}

    // Affiche le formulaire de création de mission
    public function formulaire()
    {
        $vehicules = Vehicule::all();
        return view('pages.missions.formulaire', compact('vehicules'));
    }

    // Stocke une nouvelle mission dans la base de données
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'numero_mission' => 'required|integer',
            'objectif' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'trajet' => 'required|string',
            'id_vehicule' => 'required|exists:vehicules,id_vehicule',
        ]);
        $mission = new Mission();
        $mission->numero_mission = $request->numero_mission;
        $mission->objectif = $request->objectif;
        $mission->date_debut = $request->date_debut;
        $mission->date_fin = $request->date_fin;
        $mission->trajet = $request->trajet;
        $mission->id_vehicule = $request->id_vehicule;
        $mission->save();

        return redirect()->route('missions.list')->with('success', 'Mission créée avec succès.');
    }

    // Affiche les détails d'une mission
    public function detail($id_mission)
    {
        $mission = Mission::findOrFail($id_mission);
        return view('pages.missions.detail', compact('mission'));
    }

    // Affiche le formulaire d'édition d'une mission
    public function edit($id_mission)
    {
        $mission = Mission::findOrFail($id_mission);
        $vehicules = Vehicule::all();
        return view('pages.missions.edit', compact('mission', 'vehicules'));
    }

    // Met à jour une mission dans la base de données
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'numero_mission' => 'required|integer',
            'objectif' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'trajet' => 'required|string',
            'id_vehicule' => 'required|exists:vehicules,id_vehicule',
        ]);

        $mission = Mission::findOrFail($id);
        $mission->update($validatedData);

        return redirect()->route('missions.list')->with('success', 'Mission mise à jour avec succès.');
    }

    // Supprime une mission de la base de données
    public function destroy($id_mission)
    {
        $mission = Mission::findOrFail($id_mission);
        $mission->delete();

        return redirect()->route('pages.missions.list')->with('success', 'Mission supprimée avec succès.');
    }
    public function confirmation(Request $request)
    {
        $mission = Mission::findOrFail($request->missionId);
        $mission->kilometrage = $request->kilometrage;
        if ($mission->save()){
            Flash::success('Confirmation','Mission confirmée');
        }

        return redirect()->route('missions.list');

    }
}
