<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skirt extends Model
{

    protected $table = "Skirt";
    protected function SKirtStyleContainer(){
        return $this->hasMany(SkirtStyleContainer::class);
    }
    protected $fillable = ['name','clothing_type'];
    use HasFactory;
}
