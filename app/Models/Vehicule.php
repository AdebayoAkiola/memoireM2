<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $fillable = [
        'immatriculation', 'nombre_de_place', 'id_transporteur', 'etat', 'photo1', 'photo2', 'photo3','is_deleted'
    ];
}
