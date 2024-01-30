<?php

namespace App\Exports;

use App\Models\Mission;
use Maatwebsite\Excel\Concerns\FromCollection;

class MissionsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mission::all();
    }
}
