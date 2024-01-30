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
}
