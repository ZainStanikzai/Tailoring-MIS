<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neck extends Model
{

    protected $table = "neck";

    protected function NeckStyleContainer(){
        return $this->hasMany(NeckStyleContainer::class);
    }
    protected $fillable = ['name','clothing_type'];
    use HasFactory;
}
