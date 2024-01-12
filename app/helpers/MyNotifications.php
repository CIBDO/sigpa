<?php

namespace App\helpers;

use App\Models\Mission;
use Illuminate\Support\Facades\DB;

class MyNotifications
{
    public static function carToMaintain()
    {
        $carsToMaintain = [];
        $totalKilometragePerVehicle = Mission::join('vehicules', 'missions.id_vehicule', '=', 'vehicules.id_vehicule')
            ->select('missions.id_vehicule', 'vehicules.immatriculation', DB::raw('SUM(missions.kilometrage) as total_kilometrage'))
            ->groupBy('missions.id_vehicule', 'vehicules.immatriculation')
            ->get();
//        dd($totalKilometragePerVehicle);
        foreach ($totalKilometragePerVehicle as $item){
            dd($item);
        }

    }

}
