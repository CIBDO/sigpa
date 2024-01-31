<?php

namespace App\Exports;

use App\Models\Bon;
use Maatwebsite\Excel\Concerns\FromCollection;

class BonsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Bon::all();
    }
    public function downloadFileName()
    {
        return 'bons_export.xlsx'; // Spécifiez le nom de fichier souhaité
    }
}
