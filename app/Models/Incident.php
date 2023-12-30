<?php

// app/Models/Incident.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $fillable = [
        'id_vehicule',
        'date_incident',
        'causes',
        'gravite',
        'degat',
        'description',
        'fichiers',
    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'id_vehicule');
    }

    // Ajoutez d'autres relations et méthodes au besoin
}

