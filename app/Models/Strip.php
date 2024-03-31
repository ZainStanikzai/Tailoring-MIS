<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Strip extends Model
{

    protected $table = "Strip";
    protected $fillable = ['name','clothing_type'];
    use HasFactory;
}
