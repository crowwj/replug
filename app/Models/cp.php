<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cp extends Model
{
    protected $table = 'cpvista';
    protected $primaryKey = 'idCP';
    protected $fillable = [
        'idCP',
        'CodigoPostal', 
        'NombreE', 
        'NombreM',
        'Ciudad',
        'Asentamiento', 
        'Tipo'
    ];
}


