<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_cloth extends Model
{
    use HasFactory;

    protected $fillable=['category_id','cloth_id'];
}
