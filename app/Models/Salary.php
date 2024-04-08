<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Salary extends Model
{
    protected $table = "salary";


    protected function Staff(){
        return $this->belongsTo(Staff::class,"staff_id");
    }

    protected $fillable = ["staff_id","amount"];
    use HasFactory;
}
