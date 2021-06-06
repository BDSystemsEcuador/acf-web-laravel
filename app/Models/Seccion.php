<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;
    private $fillables=[
        'imagenes'
    ];

    public function pagina (){
        return $this->belongsTo(Pagina::class);
    }
    public function imagenes(){
        return $this->hasMany(SeccionImagen::class);
    }
}
