<?php

namespace App\Exports;

use App\Models\Chauffeur;
use Maatwebsite\Excel\Concerns\FromCollection;

class ChauffeursExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Chauffeur::all();
    }
}
