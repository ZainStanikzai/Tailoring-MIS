<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tshirt extends Model
{
    protected $table = "tshirts";
    protected function Staff(){
        return $this->belongsTo(Staff::class,"staff_id");
    }
    protected function Customer(){
        return $this->belongsTo(Customer::class,"customer_id");
    }
    protected function StripStyleContainer(){
        return $this->hasMany(StripStyleContainer::class,"clothing_id");
    }
    protected function NeckStyleContainer(){
        return $this->hasMany(NeckStyleContainer::class,"clothing_id");
    }
    protected function SkirtStyleContainer(){
        return $this->hasMany(SkirtStyleContainer::class,"clothing_id");
    }
    protected function ShoulderStyleContainer(){
        return $this->hasMany(ShoulderStyleContainer::class,"clothing_id");
    }
    protected function SleeveStyleContainer(){
        return $this->hasMany(SleeveStyleContainer::class,"clothing_id");
    }
    protected $fillable = 
    [
        'customer_id',
        'staff_id',
        'customer_name',
        'customer_number',
        'height',
        'shoulder',
        'sleeve',
        'sideDown',
        'skirt',
        'neck',
        'price',
        'rakht',
        'qty',
        'paid',
        'balance',
        'status',
        'sewDate',
        'sewStatus',
        'description',
    ];

    use HasFactory;
}
