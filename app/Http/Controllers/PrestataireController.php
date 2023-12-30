<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestataire;

class PrestataireController extends Controller
{
    
        public function list()
        {
            $prestataires = Prestataire::all();
            return view('pages.prestataires.list', compact('prestataires'));
        }
    
        public function formulaire()
        {
            return view('pages.prestataires.formulaire');
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'nom_prestataire' => 'required|string',
                'contact' => 'required|string',
                'adresse' => 'required|string',
            ]);
    
            Prestataire::create($request->all());
    
            return redirect()->route('prestataires.list')
                ->with('success', 'prestataire ajoutée avec succès');
        }
    
        public function show(Prestataire $prestataire)
        {
            return view('pages.prestataires.detail', compact('prestataire'));
        }
    
        public function edit(Prestataire $prestataire)
        {
            return view('pages.prestataires.edit', compact('prestataire'));
        }
    
        public function update(Request $request, Prestataire $prestataire)
        {
            $request->validate([
                'nom_prestataire' => 'required|string',
                'contact' => 'required|string',
                'adresse' => 'required|string',
            ]);
        
            // Utiliser la méthode fill pour définir explicitement le champ à mettre à jour
            $prestataire->fill(['nom_prestataire' => $request->input('nom_prestataire')]);
            $prestataire->fill(['contact' => $request->input('contact')]);
            $prestataire->fill(['adresse' => $request->input('adresse')]);
            $prestataire->save();
        
            return redirect()->route('prestataires.list')
                ->with('success', 'prestataire modifiée avec succès');
        }
     
        public function destroy(Prestataire $prestataire)
        {
            $prestataire->delete();
    
            return redirect()->route('prestataires.list')
                ->with('success', 'prestataire supprimée avec succès');
        }
    }
    