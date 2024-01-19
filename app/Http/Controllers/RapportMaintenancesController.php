<?php

namespace App\Http\Controllers;
use App\Models\Vehicule;
use App\Models\Maintenance;
use App\Models\Prestataire;
use Illuminate\Http\Request;

class RapportMaintenancesController extends Controller
{
    public function afficherRapport()
    {
        $maintenances = Maintenance::all();
        $vehicules = Vehicule::all();
        $prestataires = Prestataire::all();
        return view('rapport.maintenances', compact('vehicules','maintenances','prestataires'));
    }
}
