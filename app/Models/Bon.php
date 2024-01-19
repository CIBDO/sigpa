<?php

// app/Models/Bon.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bon extends Model
{
    protected $primaryKey = 'id_bon';
    protected $fillable = [
        'id_vehicule',
        'numero_bon',
        'date_delivrance',
        'quantite',
        'valeur_espece',
    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'id_vehicule');
    }

    // Ajoutez d'autres relations et méthodes au besoin
}

