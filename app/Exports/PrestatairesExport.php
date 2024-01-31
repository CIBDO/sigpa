<?php

namespace App\Exports;

use App\Models\Prestataire;
use Maatwebsite\Excel\Concerns\FromCollection;

class PrestatairesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prestataire::all();
    }
    public function downloadFileName()
    {
        return 'prestataires_export.xlsx'; // Spécifiez le nom de fichier souhaité
    }
}
