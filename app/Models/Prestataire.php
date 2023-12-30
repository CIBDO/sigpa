<?php

// app/Models/Prestataire.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    protected $primaryKey = 'id_prestataire';
    protected $fillable = [
        'nom_prestataire',
        'contact',
        'adresse',
    ];

    // Ajoutez d'autres relations et méthodes au besoin
}

