<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursus extends Model
{
    use HasFactory;
    protected $fillable = [
        'diplome',
        'school',
        'start_date',
        'end_date',
        'cv_id',
    ];
    public function cv(){
        return $this->belongsTo(Cv::class);
    }
}
