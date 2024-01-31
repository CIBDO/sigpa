<?php

namespace App\Exports;

use App\Models\Vehicule;
use Maatwebsite\Excel\Concerns\FromCollection;

class VehiculesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vehicule::all();
    }
  
     
    public function downloadFileName()
    {
        return 'vehicules_export.xlsx'; 
    }
}
