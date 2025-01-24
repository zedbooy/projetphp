<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'groupe',
        'jurry',
        'rapport_path',
        'confirmed',
    ];
}

