<?php

namespace App\Exports;

use App\Models\Modele;
use Maatwebsite\Excel\Concerns\FromCollection;

class ModelesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Modele::all();
    }
    public function downloadFileName()
    {
        return 'modeles_export.xlsx'; // Spécifiez le nom de fichier souhaité
    }
}
