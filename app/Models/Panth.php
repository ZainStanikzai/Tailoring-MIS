<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panth extends Model
{
    protected $table= "panths";


    protected function Staff(){
        return $this->belongsTo(Staff::class,"staff_id");
    }
    protected function Customer(){
        return $this->belongsTo(Customer::class,"customer_id");
    }
    protected $fillable = 
    [
        'customer_id',
        'staff_id',
        'customer_name',
        'customer_number',
        'height',
        'waist',
        'leg',
        'sourin',
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
