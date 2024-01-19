<?php


namespace App\Http\Controllers;
use App\Traits\DateFilterTrait;

use App\Models\Vehicule;
use App\Models\Modele;
use App\Models\Marque;
use Illuminate\Http\Request;

class RapportVehiculesController extends Controller
{
    public function afficherRapport(Request $request)
    {
        $query = Vehicule::query();

        // Appliquez les filtres en fonction des critères
        if ($request->has('etat_vehicule')) {
            $query->where('etat_vehicule', $request->input('etat_vehicule'));
        }

        if ($request->has('utilite')) {
            $query->where('utilite', $request->input('utilite'));
        }

        // Ajoutez d'autres conditions de filtrage selon vos besoins

        $vehicules = $query->get();

        $filtres = [
            'etats_vehicules' => Vehicule::distinct('etat_vehicule')->pluck('etat_vehicule'),
            'utilites' => Vehicule::distinct('utilite')->pluck('utilite'),
            // Ajoutez d'autres filtres au besoin
        ];

        return view('rapports.vehicules', compact('vehicules', 'filtres'));
    }
    use DateFilterTrait;

    public function filtrerVehicules(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $query = Vehicule::query();

        $this->applyDateFilter($query, $start_date, $end_date, 'date_acquisition');

        $vehicules = $query->get();

        // Le reste de votre logique pour afficher les résultats
        return view('rapport.vehicules', ['vehicules' => $vehicules]);
    }
}

