<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staffs';
    protected function Cloth(){
        return $this->hasMany(Cloth::class, "staff_id");
    }
    protected function Vasket(){
        return $this->hasMany(Vaskates::class, "staff_id");
    }
    protected $fillable = [
        'name',
        'phone',
        'salary'
    ];


    
}

