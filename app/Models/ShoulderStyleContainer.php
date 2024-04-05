<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoulderStyleContainer extends Model
{
    protected $table = "shoulder_style";


    protected function Shoulder(){
        return $this->belongsTo(Shoulder::class, "shoulder_id");
    }
    protected function Vasket(){
        return $this->belongsTo(Vaskates::class, "clothing_id");
    }
    protected function Cloth(){
        return $this->belongsTo(Cloth::class, "clothing_id");
    }
    protected function Coat(){
        return $this->belongsTo(Cloth::class, "clothing_id");
    }
    protected $fillable = ["clothing_id","shoulder_id","clothing_type"];
    use HasFactory;
}
