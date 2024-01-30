<?php

namespace App\Http\Controllers;
use HepplerDotNet\FlashToastr\Flash;
use Illuminate\Http\Request;
use App\Models\Bon;
use App\Models\Vehicule;


class BonController extends Controller
{
   
    public function list()
    {
        $bons = Bon::all();
        $vehicules = Vehicule::all();
        return view('pages.bons.list', compact('bons','vehicules'));
    }

    
    public function detail($id_bon)
    {
        $bon = Bon::findOrFail($id_bon);
        return view('pages.bons.detail', compact('bon'));
    }

    public function formulaire()
    {
        
        $bons = Bon::all();
        $vehicules = Vehicule::all();
        return view('pages.bons.formulaire');
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_vehicule' => 'required',
            'numero_bon' => 'required',
            'date_delivrance' => 'required',
            'quantite' => 'required',
            'valeur_espece' => 'required',
        ]);

        Bon::create($request->all());
        Flash::info('success', 'Bon créé avec succès');
        return redirect()->route('bons.list')
            ->with('success', 'Bon créé avec succès');
    }

   
    public function edit($id_bon)
    {
        $bon = Bon::findOrFail($id_bon);
        $vehicules = Vehicule::all();
        return view('pages.bons.edit', compact('bon','vehicules'));
    }

    
    public function update(Request $request, $id_bon)
    {
        $request->validate([
            'id_vehicule' => 'required',
            'numero_bon' => 'required',
            'date_delivrance' => 'required',
            'quantite' => 'required',
            'valeur_espece' => 'required',
        ]);

        $bon = Bon::findOrFail($id_bon);
        $bon->update($request->all());
        Flash::info('success', 'Bon mis à jour avec succès');
        return redirect()->route('bons.list')
            ->with('success', 'Bon mis à jour avec succès');
    }

   
    public function destroy($id_bon)
    {
        $bon = Bon::findOrFail($id_bon);
        $bon->delete();
        Flash::info('success', 'Bon supprimé avec succès');
        return redirect()->route('bons.list')
            ->with('success', 'Bon supprimé avec succès');
    }
}
