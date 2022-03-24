<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloth extends Model
{
    use HasFactory;

   protected $fillable=['name','price','description','image','type','brand'];


public function colors()
{
    return $this->belongsToMany(Color::class);
}

public function categories(){

    return $this->belongsToMany(Category::class);
}
 
public function Designs(){
    
    return $this->hasMany(ClothDesign::class);
}

}
