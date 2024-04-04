<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripStyleContainer extends Model
{
    protected $table = "strip_style";
    protected $fillable = ['clothing_id','strip_id',"clothing_type"];
    protected function Strip(){
        return $this->belongsTo(Strip::class, "strip_id");
    }
    protected function Cloth(){
        return $this->belongsTo(Cloth::class, "clothing_id");
    }
    use HasFactory;
}
