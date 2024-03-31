<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class style_coatBackStyle extends Model
{


    protected $table ="back_style";

    protected $fillable = ['name'];
    use HasFactory;
}
