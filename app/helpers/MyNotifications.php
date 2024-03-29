<?php

namespace App\helpers;

use App\Models\Assurance;
use App\Models\Chauffeur;
use App\Models\Mission;
use App\Models\Vehicule;
use App\Models\Vidange;
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
        foreach ($totalKilometragePerVehicle as $item) {
            dd($item);
        }

    }

    public static function getVehiclesNeedingOilChange()
    {
        $maxKilometrageForOilChange = config('notifications.maxKilometrageForOilChange');
        $mostRecentKilometragePerVehicle = Mission::select('id_vehicule', DB::raw('MAX(kilometrage) as max_kilometrage'))
            ->groupBy('id_vehicule')
            ->get()->keyBy('id_vehicule');

        $mostRecentOilChangeKilometragePerVehicle = Vidange::select('id_vehicule', DB::raw('MAX(kilometrage_vidange) as max_kilometrage_vidange'))
            ->groupBy('id_vehicule')
            ->get()->keyBy('id_vehicule');

        $vehiclesNeedingOilChange = [];
//dd($mostRecentKilometragePerVehicle,$mostRecentOilChangeKilometragePerVehicle);
        foreach ($mostRecentKilometragePerVehicle as $vehicleId => $vehicleData) {
            $lastOilChangeKilometrage = $mostRecentOilChangeKilometragePerVehicle[$vehicleId]->max_kilometrage_vidange ?? 0;


            if ($vehicleData->max_kilometrage - $lastOilChangeKilometrage >= $maxKilometrageForOilChange) {
                $vehicle = Vehicule::find($vehicleId);
                $vehiclesNeedingOilChange[] = [
                    'id' => $vehicleId,
                    'immatriculation' => $vehicle->immatriculation,
                    'max_kilometrage' => $vehicleData->max_kilometrage,
                    'parcouru'=>$vehicleData->max_kilometrage - $lastOilChangeKilometrage
                ];
            }
        }

        return $vehiclesNeedingOilChange;
    }

    public static function sumNotifications(): int
    {
        return count(MyNotifications::getVehiclesNeedingOilChange()) + count(MyNotifications::getDriversWithLicenseExpiringSoon()) + count(MyNotifications::getDriversWithInsuranceExpiringSoon());

    }

    public static function getDriversWithLicenseExpiringSoon()
    {
        $days = config('notifications.renouvellementPermis');
        $dateThreshold = \Carbon\Carbon::now()->addDays($days);

        return Chauffeur::where('validite_permis', '<=', $dateThreshold)->get();
    }

    public static function getDriversWithInsuranceExpiringSoon($id = null)
    {
        $days = config('notifications.renouvellementAssurance');
        $dateThreshold = \Carbon\Carbon::now()->addDays($days);

        if ($id) {
            return (bool)Assurance::where('id_assurance', $id)
                ->where(function ($query) use ($dateThreshold) {
                    $query->where('date_fin', '<=', $dateThreshold);
                })
                ->first();
        }

        return Assurance::where('date_fin', '<=', $dateThreshold)->get();
    }

    public static function checkChangeOil($id)
    {
        $vehicles = MyNotifications::getVehiclesNeedingOilChange();
        $vehicle = array_search($id, array_column($vehicles, 'id'));
        return $vehicle !== false;
    }

    public static function getChangeOilInfo($id)
    {
        $vehicles = MyNotifications::getVehiclesNeedingOilChange();

        $filteredVehicles = array_filter($vehicles, function($vehicle) use ($id) {
            return $vehicle['id'] == $id;
        });

        return $filteredVehicles ? reset($filteredVehicles) : null;
    }

}
