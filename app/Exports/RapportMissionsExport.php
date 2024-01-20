<?php

namespace App\Exports;

use App\Models\Mission;
use App\Models\Marque;
use Maatwebsite\Excel\Concerns\FromCollection;

class RapportMissionsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mission::all();
        return Marque::all();
    }
}
