<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeckStyleContainer extends Model
{

    protected $table = "neck_style";
    
    protected function Neck(){
        return $this->belongsTo(Neck::class, "neck_id");
    }
    protected function Vasket(){
        return $this->belongsTo(Vaskates::class, "clothing_id");
    }

    protected $fillable = ["clothing_id","neck_id",""];
    use HasFactory;
}
