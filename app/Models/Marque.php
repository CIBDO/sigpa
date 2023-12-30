<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    // Dans le modèle Marque
protected $primaryKey = 'id_marque';

    protected $fillable = ['nom_marque',];

    public function vehicules()
    {
        return $this->hasMany(Vehicule::class, 'id_marque');
    }

    // Ajoutez d'autres relations et méthodes au besoin
}
