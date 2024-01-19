<?php

namespace App\Http\Controllers;
use App\Models\IncidentFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Incident;
use App\Models\Vehicule;

class IncidentController extends Controller
{
    public function list()
    {
        $incidents = Incident::all();
        $vehicules = Vehicule::all();
        return view('pages.incidents.list', compact('incidents','vehicules'));
    }
    public function formulaire()
    {
        $vehicules = Vehicule::all();
        $incidents = Incident::all();
        return view('pages.incidents.formulaire', compact('vehicules',));
    }
    
    public function detail($id_incident)
    {
        $incident = Incident::find($id_incident);

        if (!$incident) {
            abort(404, 'Incident non trouvé');
        }

        return view('pages.incidents.detail', compact('incident'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_vehicule' => 'required',
            'date_incident' => 'required',
            'causes' => 'required',
            'gravite' => 'required',
            'degat' => 'required',
            'description' => 'required',
            'fichiers' => 'required',
            // Ajoutez d'autres règles de validation au besoin
        ], [
            'required' => 'Le champ :attribute est requis.',
        ]);
        // Traitement des fichiers multiples
        if ($request->hasFile('fichiers')) {
            $fichiers = [];
            foreach ($request->file('fichiers') as $file) {
                $path = $file->store('public/incident_images');
                $fichiers[] = str_replace('public/', '', $path);
            }
            $request->merge(['fichiers' => json_encode($fichiers)]);
        }
        $incident = Incident::create($request->all());

        return redirect()->route('incidents.formulaire', $incident->id_incident)
            ->with('success', 'Incident créé avec succès');
    }
    public function edit(Incident $incident)
    {
       
        $vehicules = Vehicule::all();
        return view('pages.incidents.edit', compact('vehicules', 'incident'));
    }

    public function update(Request $request, $id_incident)
{
    $this->validate($request, [
        'id_vehicule' => 'required',
        'date_incident' => 'required',
        'causes' => 'required',
        'gravite' => 'required',
        'degat' => 'required',
        'description' => 'required',
        'fichiers.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation pour chaque fichier
        // Ajoutez d'autres règles de validation au besoin
    ], [
        'required' => 'Le champ :attribute est requis.',
        'fichiers.*.image' => 'Le champ :attribute doit être une image.',
        'fichiers.*.mimes' => 'Le champ :attribute doit être de type :values.',
        'fichiers.*.max' => 'Le champ :attribute ne doit pas dépasser :max kilo-octets.',
    ]);

    $incident = Incident::find($id_incident);

    if (!$incident) {
        abort(404, 'Incident non trouvé');
    }

    // Traitement des fichiers multiples
    if ($request->hasFile('fichiers')) {
        foreach ($request->file('fichiers') as $file) {
            $path = $file->store('public/incident_images');
            $incident->files()->create([
                'file_path' => str_replace('public/', '', $path),
            ]);
        }
    }

    $incident->update($request->except('fichiers'));

    return redirect()->route('incidents.list', $incident->id_incident)
        ->with('success', 'Incident mis à jour avec succès');
}
    public function destroy($id_incident)
    {
        $incident = Incident::find($id_incident);

        if (!$incident) {
            abort(404, 'Incident non trouvé');
        }

        $incident->delete();

        return redirect()->route('incidents.list')
            ->with('success', 'Incident supprimé avec succès');
    }
}
