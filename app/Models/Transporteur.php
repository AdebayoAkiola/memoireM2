<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transporteur extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'login', 'password', 'prenom', 'nom', 'telephone','email', 'etat', 'photo', 'note','is_deleted'
    ];

    public static function generateLogin($prenom, $nom)
    {
        $prenom = Str::of($prenom)->lower()->substr(0, 3);
        $nom = Str::of($nom)->lower()->substr(0, 2);
        $nombre_aleatoire = rand(1, 100);

        $login = "tr".$nom."_".$prenom."".$nombre_aleatoire;
        return $login;
    }

}
