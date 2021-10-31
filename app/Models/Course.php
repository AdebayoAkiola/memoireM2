<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'date_depart', 'heure_depart', 'duree', 'prix', 'id_vehicule', 'id_chauffeur', 'id_trajet','is_deleted','etat', 'id_createur','profil_createur'
    ];
}
