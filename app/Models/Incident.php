<?php

// app/Models/Incident.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $primaryKey = 'id_incident';
    protected $fillable = [
        'id_vehicule',
        'date_incident',
        'causes',
        'gravite',
        'degat',
        'description',
        
    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'id_vehicule');
    }
    public function files()
    {
        return $this->hasMany(IncidentFile::class, 'id_incident');
    }
}
