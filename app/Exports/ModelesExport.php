<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Modele;

class ModelesExport implements FromCollection
{
    public function collection()
    {
        return Modele::all();
    }
}
