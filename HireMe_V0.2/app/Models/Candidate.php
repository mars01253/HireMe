<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'email',
        'photo',
        'titre',
        'current_position',
        'industry',
        'address',
        'about'
    ];
}
