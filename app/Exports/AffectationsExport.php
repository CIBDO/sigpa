<?php

namespace App\Exports;

use App\Models\affectation;
use Maatwebsite\Excel\Concerns\FromCollection;

class AffectationsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return affectation::all();
    }
    public function downloadFileName()
    {
        return 'affectations_export.xlsx'; // Spécifiez le nom de fichier souhaité
    }
}
