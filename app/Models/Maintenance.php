<?php

// app/Models/Maintenance.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $primaryKey = 'id_maintenance';
    protected $fillable = [
        'id_vehicule',
        'id_prestataire',
        'numero_facture',
        'cout',
        'date_debut',
        'date_fin',
        'id_type_maintenance',
        'travaux',
        'statut',
    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'id_vehicule');
    }

    public function prestataire()
    {
        return $this->belongsTo(Prestataire::class, 'id_prestataire');
    }

    // Ajoutez d'autres relations et méthodes au besoin
}
