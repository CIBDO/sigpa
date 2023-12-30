<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

    use App\Models\Affectation;
    use App\Models\Service;
    use App\Models\Modele;
    use App\Models\Marque;
    use App\Models\Vehicule;
    

class AffectationController extends Controller
{
  
        public function list()
        {
            
            $affectations = Affectation::with(['service', 'modele', 'marque', 'vehicule'])->get();
    $services = Service::all(); // Remplacez cela par votre logique pour récupérer les missions
    $modeles = Modele::all(); // Remplacez cela par votre logique pour récupérer les véhicules
    $marques = Marque::all(); // Remplacez cela par votre logique pour récupérer les missions
    $vehicules = Vehicule::all(); // Remplacez cela par votre logique pour récupérer les véhicules
    
    return view('pages.affectations.list', compact('affectations', 'services', 'vehicules'=>, 'modeles', 'marques'));
        }
    
        public function detail($id_affectation)
        {
            $affectation = Affectation::with(['service', 'modele', 'marque', 'vehicule'])->find($id_affectation);
    
            return view('pages.affectations.detail', compact('affectation'));
        }
    
        public function formulaire()
        {
            $services = Service::all();
            $modeles = Modele::all();
            $marques = Marque::all();
            $vehicules = Vehicule::all();
    
            return view('pages.affectations.formulaire', compact('services', 'modeles', 'marques', 'vehicules'));
        }
    
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'id_service' => 'required|exists:services,id_service',
                'id_modele' => 'required|exists:modeles,id_modele',
                'id_marque' => 'required|exists:marques,id_marque',
                'id_vehicule' => 'required|exists:vehicules,id_vehicule',
                'date_affectation' => 'required|date',
                'statut' => 'required|string',
            ]);
    
            Affectation::create($validatedData);
    
            return redirect()->route('affectations.list')->with('success', 'Affectation créée avec succès.');
        }
    
        public function edit($id_affectation)
        {
            $affectation = Affectation::with(['service', 'modele', 'marque', 'vehicule'])->find($id_affectation);
            $services = Service::all();
            $modeles = Modele::all();
            $marques = Marque::all();
            $vehicules = Vehicule::all();
    
            return view('pages.affectations.edit', compact('affectation', 'services', 'modeles', 'marques', 'vehicules'));
        }
    
        public function update(Request $request, $id_affectation)
        {
            $validatedData = $request->validate([
                'id_service' => 'required|exists:services,id_service',
                'id_modele' => 'required|exists:modeles,id_modele',
                'id_marque' => 'required|exists:marques,id_marque',
                'id_vehicule' => 'required|exists:vehicules,id_vehicule',
                'date_affectation' => 'required|date',
                'statut' => 'required|string',
            ]);
    
            $affectation = Affectation::find($id_affectation);
            $affectation->update($validatedData);
    
            return redirect()->route('affectations.list')->with('success', 'Affectation mise à jour avec succès.');
        }
    
        public function destroy($id_affectation)
        {
            $affectation = Affectation::find($id_affectation);
            $affectation->delete();
    
            return redirect()->route('affectations.list')->with('success', 'Affectation supprimée avec succès.');
        }
    }
    