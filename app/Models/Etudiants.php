<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiants extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'filiere',
    ];
}
