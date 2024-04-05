<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkirtStyleContainer extends Model
{
    protected $table = "skirt_style";

    protected function SKirt(){
        return $this->belongsTo(Skirt::class, "skirt_id");
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

    protected $fillable = ["clothing_id","skirt_id","clothing_type"];
    use HasFactory;
}
