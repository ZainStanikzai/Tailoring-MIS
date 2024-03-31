<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shoulder extends Model
{
    protected $table = "shoulder";
    protected $fillable = ['name','clothing_type'];
    use HasFactory;
}
