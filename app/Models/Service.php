<?php

// app/Models/Service.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $primaryKey = 'id_service';
    protected $fillable = [
        'nom_service',
        'description',
    ];

    public function chauffeurs()
    {
        return $this->hasMany(Chauffeur::class, 'id_service');
    }
    public function affectations()
    {
        return $this->hasMany(Affectation::class, 'id_service');
    }

    // Ajoutez d'autres relations et méthodes au besoin
}

