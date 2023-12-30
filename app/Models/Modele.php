<?php

// app/Models/Modele.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    protected $primaryKey = 'id_modele';
    protected $fillable = [
        'nom_modele',
    ];

    public function vehicules()
    {
        return $this->hasMany(Vehicule::class, 'id_modele');
    }

    // Ajoutez d'autres relations et méthodes au besoin
}
