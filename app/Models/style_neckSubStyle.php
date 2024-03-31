<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class style_neckSubStyle extends Model
{

    protected $table = "neck_sub";
    protected $fillable = ['name'];
    use HasFactory;
}
