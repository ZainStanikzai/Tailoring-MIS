<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\WithPagination;

class Vaskates extends Model
{

    use WithPagination;
    protected $table = "vaskates";


    protected function Customer(){
        return $this->belongsTo(Customer::class , "customer_id");
    }
    protected function ShoulderContainer(){
        return $this->hasMany(ShoulderStyleContainer::class,'clothing_id');
    }
    protected function NeckContainer(){
        return $this->hasMany(NeckStyleContainer::class,'clothing_id');
    }
    protected function SkirtContainer(){
        return $this->hasMany(SkirtStyleContainer::class,'clothing_id');
    }



    protected $fillable = 
    [
        'customer_id',
        'customer_name',
        'customer_number',
        'staff_id',
        'height',
        'shoulder',
        'side',
        'waist',
        'neck',
        'price',
        'qty',
        'paid',
        'balance',
        'rakht',
        'sewDate',
        'status',
        'sewStatus',
        'description'
    ];
    use HasFactory;
}
