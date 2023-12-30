<?php

// app/Models/Affectation.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affectation extends Model

{
    protected $primaryKey = 'id_affectation';

    protected $fillable = [
        'id_service',
        'id_modele',
        'id_marque',
        'id_vehicule',
        'date_affectation',
        'statut',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }

    public function modele()
    {
        return $this->belongsTo(Modele::class, 'id_modele');
    }

    public function marque()
    {
        return $this->belongsTo(Marque::class, 'id_marque');
    }

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'id_vehicule');
    }

    // Ajoutez d'autres relations et méthodes au besoin
}

