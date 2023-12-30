<?php

// app/Models/Mission.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = [
        'numero_mission',
        'objectif',
        'date_debut',
        'date_fin',
        'trajet',
        'id_vehicule'
    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'id_vehicule');
    }

    // Ajoutez d'autres relations et méthodes au besoin
}

