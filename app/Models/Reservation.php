<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_de_place', 'point_depart',  'point_darrivee', 'etat', 'id_course', 'id_client'
    ];
}
