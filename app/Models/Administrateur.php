<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Administrateur extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id', 'login', 'password', 'prenom', 'nom', 'telephone','email', 'etat', 'photo', 'is_deleted'
    ];

    public static function generateLogin($prenom, $nom)
    {
        $prenom = Str::of($prenom)->lower()->substr(0, 3);
        $nom = Str::of($nom)->lower()->substr(0, 2);
        $nombre_aleatoire = rand(1, 100);

        $login = "ad".$nom."_".$prenom."".$nombre_aleatoire;
        return $login;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
