<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coat extends Model
{



    protected $table= "coats";


    protected function Staff(){
        return $this->belongsTo(Staff::class,"staff_id");
    }
    protected function Customer(){
        return $this->belongsTo(Customer::class,"customer_id");
    }
    protected function neckSubStyle(){
        return $this->belongsTo(style_neckSubStyle::class,"neckSubStyle_id");
    }
    protected function beckStyle(){
        return $this->belongsTo(style_coatBackStyle::class,"backStyle_id");
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










    protected $fillable= 
    [
        'customer_id',
        'staff_id',
        'customer_name',
        'customer_number',
        'height',
        'shoulder',
        'sleeve',
        'side',
        'waist',
        'sourin',
        'crossBig',
        'cross',
        'neckSubStyle_id',
        'backStyle_id',
        'price',
        'qty',
        'rakht',
        'paid',
        'balance',
        'status',
        'sewDate',
        'sewStatus',
        'description',
    ];

    use HasFactory;
}
