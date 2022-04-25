<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TailorProfile extends Model
{
    use HasFactory;
    protected $fillable=['name','avatar','description','specialist','phone','location','experience'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
