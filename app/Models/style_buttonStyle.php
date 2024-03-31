<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class style_buttonStyle extends Model
{

    protected $table = "button_style";
    protected $fillable = ['name'];
    use HasFactory;
}
