<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=['category_id','cloth_id','user_id','quantity','order_number'];


    public function Cloth(){
        return $this->belongsTo(Cloth::class);
    }


    public function category(){
        return $this->belongsTo(Category::class);
    }
}
