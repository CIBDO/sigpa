<?php

namespace App\Http\Controllers;
use App\Models\Mission;
use App\Models\Vehicule;
use App\Models\Incident;
use App\Models\Maintenance;
 

class DashboardController extends Controller
{
    public function index()
    {
        $totalVehicules = Vehicule::count();
        $totalMissions = Mission::count();
        $totalMaintenances = Maintenance::count();
        $totalIncidents = Incident::count();
        
        $vehicules = Vehicule::all();
        $missions = Mission::all();
        $maintenances = Maintenance::all();
        $incidents = Incident::all();
    
        $dashCounts = [
            ['class' => 'total-vehicules', 'label' => 'Total Vehicules', 'icon' => 'user', 'value' => $totalVehicules],
            ['class' => 'total-mission', 'label' => 'Total en Mission', 'icon' => 'user', 'value' => $totalMissions],
            ['class' => 'total-maintenance', 'label' => 'Total en Maintenance', 'icon' => 'user', 'value' => $totalMaintenances],
            ['class' => 'total-incident', 'label' => 'Total en Incident', 'icon' => 'user', 'value' => $totalIncidents],
        ];

        // Passer la variable $vehicules à la vue, corrigez cette ligne
        return view('pages.home.index', compact('vehicules', 'dashCounts', 'totalMissions', 'totalIncidents', 'totalVehicules', 'totalMaintenances'));
    }
}