<?php

// app/Models/Chauffeur.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'date_naiss',
        'genre',
        'email',
        'telephone',
        'numero_permis',
        'categorie_permis',
        'validite_permis',
        'id_service',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }

    // Ajoutez d'autres relations et méthodes au besoin
}
