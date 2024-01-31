<?php

namespace App\Exports;

use App\Models\Maintenance;
use Maatwebsite\Excel\Concerns\FromCollection;

class MaintenancesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Maintenance::all();
    }
    public function downloadFileName()
    {
        return 'maintenances_export.xlsx'; // Spécifiez le nom de fichier souhaité
    }
}
