<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neck extends Model
{

    protected $table = "neck";

    protected $fillable = ['name','clothing_type'];
    use HasFactory;
}
