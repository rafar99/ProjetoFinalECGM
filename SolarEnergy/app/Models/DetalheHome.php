<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalheHome extends Model
{
    use HasFactory;
    protected $table = 'home'; //alterar para o nome da tabela info do inicio
    protected $guarded =[];
}
