<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disponibilidade extends Model
{
    use HasFactory;
    protected $table = 'disponibilidade';
    protected $guarded =[];
    
    protected $fillable = [];
    protected $dates = ['dia','hora'];
}
