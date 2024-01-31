<?php

namespace App\Exports;

use App\Models\Assurance;
use Maatwebsite\Excel\Concerns\FromCollection;

class AssurancesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Assurance::all();
    }
    public function downloadFileName()
    {
        return 'assurances_export.xlsx'; // Spécifiez le nom de fichier souhaité
    }
}
