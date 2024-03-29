<?php

namespace App\Http\Controllers;
use HepplerDotNet\FlashToastr\Flash;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Modele;
use Illuminate\Http\Request;
use App\Exports\ModelesExport;




class ModeleController extends Controller
{
  

    public function list()
    {
        $modeles = Modele::all();
        return view('pages.modeles.list', compact('modeles'));
    }

    public function formulaire()
    {
        return view('pages.modeles.formulaire');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_modele' => 'required|string',
        ]);

        Modele::create($request->all());
        Flash::info('success', 'Modèle ajoutée avec succès');
        return redirect()->route('modeles.list')
            ->with('success', 'Modèle ajoutée avec succès');
    }

    public function detail(Modele $modele)
    {
        return view('pages.modeles.detail', compact('modele'));
    }

    public function edit(Modele $modele)
    {
        return view('pages.modeles.edit', compact('modele'));
    }

    public function update(Request $request, Modele $modele)
    {
        $request->validate([
            'nom_modele' => 'required|string',
        ]);
    
        // Utiliser la méthode fill pour définir explicitement le champ à mettre à jour
        $modele->fill(['nom_modele' => $request->input('nom_modele')]);
        $modele->save();
        Flash::info('success', 'Modele modifiée avec succès');
        return redirect()->route('modeles.list')
            ->with('success', 'Modele modifiée avec succès');
    }
 
    public function destroy(Modele $modele)
    {
        $modele->delete();
        Flash::info('success', 'Modèle supprimée avec succès');
        return redirect()->route('modeles.list')
            ->with('success', 'Modèle supprimée avec succès');
    }
     
    public function export()
    {
        return Excel::download(new ModelesExport, 'modeles.xlsx');
    }
    
}