<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionImage extends Model
{
    use HasFactory;
    protected $fillable = ['image'];
    protected $with = ['section'];

    public function section () 
    {
        return $this->belongsTo(Section::class);
    }
}
