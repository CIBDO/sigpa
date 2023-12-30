<?php

// app/Models/Vehicule.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $primaryKey = 'id_vehicule';
    protected $fillable = [
        'immatriculation',
        'date_immatriculation',
        'etat_vehicule',
        'numero_chasis',
        'date_circulation',
        'utilite',
        'statut',
        'id_modele',
        'id_marque',
        'energie',
        'date_acquisition',
    ];

    public function modele()
    {
        return $this->belongsTo(Modele::class, 'id_modele');
    }

    public function marque()
    {
        return $this->belongsTo(Marque::class, 'id_marque');
    }

    // Ajoutez d'autres relations et méthodes au besoin
}
