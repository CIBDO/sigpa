<?php

// app/Models/Assurance.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assurance extends Model
{
    protected $primaryKey = 'id_assurance';

    protected $fillable = [
        'nom_assurance',
        'type_assurance',
        'id_vehicule',
        'date_debut',
        'date_fin',
        'statut',
        'jours_restant',
    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'id_vehicule');
    }

    // Ajoutez d'autres relations et méthodes au besoin
}

