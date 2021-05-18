<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillables = [
        'titulo',
        'mini_descripcion',
        'imagen'
    ];
    protected $hidden = [
        'id',
        'descripcion',
        'created_at',
        'updated_at'
    ];
    protected $dates = ['deleted_at'];
}
