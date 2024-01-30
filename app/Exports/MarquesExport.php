<?php

namespace App\Exports;

use App\Models\Marque;
use Maatwebsite\Excel\Concerns\FromCollection;

class MarquesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Marque::all();
    }
}
