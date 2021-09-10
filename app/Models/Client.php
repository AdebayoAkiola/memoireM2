<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'password', 'prenom', 'nom', 'telephone','email','photo', 'etat', 'is_deleted'
    ];



}
