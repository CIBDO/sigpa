<?php

namespace App\Exports;

use App\Models\Incident;
use Maatwebsite\Excel\Concerns\FromCollection;

class IncidentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Incident::all();
    }
    public function downloadFileName()
    {
        return 'incidents_export.xlsx'; // Spécifiez le nom de fichier souhaité
    }
}
