<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloth_Color extends Model
{
    use HasFactory;
    
    protected $fillable=['color_id','cloth_id'];
}
