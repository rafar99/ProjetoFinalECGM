<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morada extends Model
{
    use HasFactory;
    protected $table = "morada_pedido";
    protected $guarded =[];

    protected $fillable =[
        'rua', 'porta', 'codigo_postal', 'concelho'
    ];

    public function morada(){
        return $this->hasMany(Pedido::class);
    }
}
