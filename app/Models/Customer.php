<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['id','name','numbers',];

    protected function Vaskate(){
        return $this->hasMany(Vaskates::class,"customer_id");
    }
    protected function Cloth(){
        return $this->hasMany(Cloth::class,'customer_id');
    }
    protected function Coat(){
        return $this->hasMany(Coat::class,'customer_id');
    }
    use HasFactory;
}
