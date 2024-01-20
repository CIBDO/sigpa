<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Marque;

class MarquesExport implements FromCollection
{
    public function collection()
    {
        return Marque::all();
    }
}
