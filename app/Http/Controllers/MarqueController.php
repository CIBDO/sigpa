<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marque;
use HepplerDotNet\FlashToastr\Flash;
use App\Exports\MarquesExport;
use Maatwebsite\Excel\Facades\Excel;

class MarqueController extends Controller
{
    public function list()
    {
        $marques = Marque::all();
        return view('pages.marques.list', compact('marques'));
    }

    public function formulaire()
    {
        return view('pages.marques.formulaire');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_marque' => 'required|string',
        ]);

        Marque::create($request->all());
        Flash::info('success', 'Marque ajoutée avec succès');
        return redirect()->route('marques.list')->with('success', 'Marque ajoutée avec succès');
           

    }

    public function show(Marque $marque)
    {
        return view('pages.marques.detail', compact('marque'));
    }

    public function edit(Marque $marque)
    {
        return view('pages.marques.edit', compact('marque'));
    }

    public function update(Request $request, Marque $marque)
    {
        $request->validate([
            'nom_marque' => 'required|string',
        ]);
    
        // Utiliser la méthode fill pour définir explicitement le champ à mettre à jour
        $marque->fill(['nom_marque' => $request->input('nom_marque')]);
        $marque->save();
        Flash::info('success', 'Marque modifiée avec succès');
        return redirect()->route('marques.list')
            ->with('success', 'Marque modifiée avec succès');
    }
 
    public function destroy(Marque $marque)
    {
        $marque->delete();
        Flash::info('success', 'Marque supprimée avec succès');
        return redirect()->route('marques.list')
            ->with('success', 'Marque supprimée avec succès');
    }
   
        public function export()
        {
            return Excel::download(new MarquesExport, 'marques.xlsx');
        }
    
}
