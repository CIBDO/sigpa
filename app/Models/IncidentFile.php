<?php

// app/Models/IncidentFile.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncidentFile extends Model
{
    protected $fillable = [
        'id_incident',
        'file_path',
    ];

    public function incident()
    {
        return $this->belongsTo(Incident::class, 'id_incident');
    }
}
