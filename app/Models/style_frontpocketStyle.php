<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class style_frontpocketStyle extends Model
{

    protected $table = "front_pocket_style";


    protected $fillable = ['name'];
    use HasFactory;
}
