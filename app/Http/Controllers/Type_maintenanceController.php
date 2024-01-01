<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type_maintenance;

class Type_maintenanceController extends Controller
{
    public function list()
    {
        $typesMaintenance = Type_maintenance::all();
        return view('pages.type_maintenances.list', compact('typesMaintenance'));
    }

    public function create()
    {
        return view('pages.type_maintenances.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_maintenance' => 'required',
            'description' => 'required',
        ]);

        Type_maintenance::create($request->all());

        return redirect()->route('type_maintenances.list')
            ->with('success', 'Type de maintenance créé avec succès.');
    }

    public function show(Type_maintenance $typeMaintenance)
    {
        return view('types_maintenance.show', compact('typeMaintenance'));
    }

    public function edit($id_type_maintenance)
    {
        $typeMaintenance = Type_maintenance::find($id_type_maintenance);
        return view('pages.type_maintenances.edit', compact('typeMaintenance'));
    }

    public function update(Request $request, $id_type_maintenance)
    {
        $request->validate([
            'type_maintenance' => 'required',
            'description' => 'required',
        ]);
    
        $typeMaintenance = Type_maintenance::find($id_type_maintenance);
    
        if (!$typeMaintenance) {
            // Gérer le cas où la ressource n'est pas trouvée
            // Peut-être rediriger avec un message d'erreur
            return redirect()->back()->with('error', 'Type de maintenance non trouvé.');
        }
    
        $typeMaintenance->update($request->all());
    
        return redirect()->route('type_maintenances.list')
            ->with('success', 'Type de maintenance mis à jour avec succès.');
    }
    

    public function destroy(Type_maintenance $typeMaintenance)
    {
        $typeMaintenance->delete();

        return redirect()->route('type_maintenances.list')
            ->with('success', 'Type de maintenance supprimé avec succès.');
    }
}
