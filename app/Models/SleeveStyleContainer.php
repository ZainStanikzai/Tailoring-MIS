<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SleeveStyleContainer extends Model
{
    protected $table = "sleeve_style";
    protected $fillable = ['clothing_id','sleeve_id',"clothing_type"];
    protected function Sleeve(){
        return $this->belongsTo(Sleeve::class, "sleeve_id");
    }
    protected function Cloth(){
        return $this->belongsTo(Cloth::class, "clothing_id");
    }
    use HasFactory;
}
