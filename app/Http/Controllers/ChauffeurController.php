<?php

namespace App\Http\Controllers;
use HepplerDotNet\FlashToastr\Flash;
use Illuminate\Http\Request;
use App\Models\Chauffeur;
use App\Models\Service;

class ChauffeurController extends Controller
{
    public function list()
    {
        $chauffeurs = Chauffeur::all();
        return view('pages.chauffeurs.list', compact('chauffeurs'));
    }

    public function formulaire()
    {
        $services = Service::all();
        return view('pages.chauffeurs.formulaire', compact('services'));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'matricule' => 'required|string',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'date_naiss' => 'required|date',
            'genre' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|string',
            'numero_permis' => 'required|string',
            'categorie_permis' => 'required|string',
            'validite_permis' => 'required|date',
            'id_service' => 'required|exists:services,id_service',
        ]);

        // Créer un nouveau chauffeur
        Chauffeur::create($request->all());
        Flash::info('success', 'Chauffeur ajouté avec succès');
        // Rediriger vers la liste des chauffeurs avec un message de succès
        return redirect()->route('chauffeurs.formulaire')->with('success', 'Chauffeur ajouté avec succès');
    }

    public function detail($id_chauffeur)
    {
        $chauffeur = Chauffeur::findOrFail($id_chauffeur);
        return view('pages.chauffeurs.detail', compact('chauffeur'));
    }

    public function edit($id_chauffeur)
    {
        $services = Service::all();
        $chauffeur = Chauffeur::findOrFail($id_chauffeur);
        return view('pages.chauffeurs.edit', compact('chauffeur', 'services'));
    }

    public function update(Request $request, $id_chauffeur)
    {
        // Valider les données du formulaire
        $request->validate([
            'matricule' => 'required|string',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'date_naiss' => 'required|date',
            'genre' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|string',
            'numero_permis' => 'required|string',
            'categorie_permis' => 'required|string',
            'validite_permis' => 'required|date',
            'id_service' => 'required|exists:services,id_service',
        ]);

        // Mettre à jour le chauffeur
        $services = Service::all();
        $chauffeur = Chauffeur::findOrFail($id_chauffeur);
        $chauffeur->update($request->all());
        Flash::info('success', 'Chauffeur mis à jour avec succès');
        // Rediriger vers la liste des chauffeurs avec un message de succès
        return redirect()->route('chauffeurs.list')->with('success', 'Chauffeur mis à jour avec succès');
    }

    public function destroy($id_chauffeur)
    {
        // Supprimer le chauffeur
        $chauffeur = Chauffeur::findOrFail($id_chauffeur);
        $chauffeur->delete();
        Flash::info('success', 'Chauffeur supprimé avec succès');
        // Rediriger vers la liste des chauffeurs avec un message de succès
        return redirect()->route('chauffeurs.list')->with('success', 'Chauffeur supprimé avec succès');
    }
}
