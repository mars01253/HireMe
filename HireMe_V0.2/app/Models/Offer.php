<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'enterprise_id',
        'title',
        'skills',
        'description',
        'Contract',
        'Location'
    ];
    public function enterprise(){
        return $this->belongsTo(Enterprise::class);
    }
}
