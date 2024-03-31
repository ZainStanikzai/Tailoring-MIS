<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class style_sleeveMouthStyle extends Model
{


    protected $table ="sleeve_mouth";


    protected $fillable = ['name'];
    use HasFactory;
}
