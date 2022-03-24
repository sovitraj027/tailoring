<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClothDesign extends Model
{
    use HasFactory;
    
    protected $fillable=['name','image','cloth_id'];


    //  public function cloth()
    // {
    //   $this->belongsTo(Cloth::class);
    // }



}
