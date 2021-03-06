<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    use HasFactory;
    protected $fillable=['user_id','cloth_id','status','quantity','price'];



    public function user(){
        return $this->belongsTo(User::class);
    }

    
    public function cloth(){
        return $this->belongsTo(Cloth::class);
    }
}
