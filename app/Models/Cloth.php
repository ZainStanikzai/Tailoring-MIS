<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\WithPagination;


class Cloth extends Model
{
    use WithPagination;
    protected $table = "cloths";



    protected function Staff(){
        return $this->belongsTo(Staff::class,"staff_id");
    }
    protected function Customer(){
        return $this->belongsTo(Customer::class,"customer_id");
    }
    protected function SidePocket(){
        return $this->belongsTo(style_sidepocketStyle::class,"sidePocketStyle_id");
    }
    protected function FrontPocket(){
        return $this->belongsTo(style_frontpocketStyle::class,"frontPocketStyle_id");
    }
    protected function Salaye(){
        return $this->belongsTo(style_salayeeStyle::class,"salayeeStyle_id");
    }
    protected function Button(){
        return $this->belongsTo(style_buttonStyle::class,"buttonStyle_id");
    }
    protected function SleeveMouth(){
        return $this->belongsTo(style_sleeveMouthStyle::class,"sleeveMouthStyle_id");
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
        'neck',
        'side',
        'sideDown',
        'skirt',
        'tumban',
        'surren',
        'leg',
        'tumbanPocket',
        'sideDown',
        'sidePocketStyle_id',
        'frontPocketStyle_id',
        'salayeeStyle_id',
        'buttonStyle_id',
        'sleeveMouthStyle_id',
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
