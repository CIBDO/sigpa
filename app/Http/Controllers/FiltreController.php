<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;

class FiltreController extends Controller
{
    public function filtrerVehicules(Request $request)
{
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');

    $query = Vehicule::query();

    if ($start_date && $end_date) {
        // Filtrer par plage de dates
        $query->whereBetween('date_acquisition', [$start_date, $end_date]);
    }

    $vehicules = $query->get();

    // Le reste de votre logique pour afficher les résultats
    return view('rapports.vehicules', ['vehicules' => $vehicules]);
}

}
