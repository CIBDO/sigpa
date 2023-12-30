<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Vehicule;
use App\Models\Incident;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalVehicules = Vehicule::count();
        $totalMaintenances = Maintenance::count();
        $totalIncidents = Incident::count();
        $totalMissions = Mission::count();

        return view('pages.home.index', [
            'totalVehicules' => $totalVehicules,
            'totalMaintenances' => $totalMaintenances,
            'totalIncidents' => $totalIncidents,
            'totalMissions' => $totalMissions,
        ]);
    }
}
