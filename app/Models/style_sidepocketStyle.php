<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class style_sidepocketStyle extends Model
{
    protected $table = "side_pocket_style";
    protected $fillable = ['name'];
    use HasFactory;
}
