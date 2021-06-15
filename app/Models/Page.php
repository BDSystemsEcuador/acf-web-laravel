<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ['id','title','description','category_id'];
    public function category () 
    {
        return $this->belongsTo(Category::class,'id');
    }
    public function sections () 
    {
        return $this->hasMany(Section::class);
    }
}
