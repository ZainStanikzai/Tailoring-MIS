<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skirt extends Model
{

    protected $table = "Skirt";
    protected $fillable = ['name','clothing_type'];
    use HasFactory;
}
