<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_maintenance extends Model
{
    protected $primaryKey = 'id_type_maintenance';

    protected $fillable = [
        'type_maintenance',
        'description',
    ];
}
