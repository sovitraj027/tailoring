<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cloth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
   public function myOrder(){
$cart=Cart::where('user_id',Auth()->user()->id)->pluck('cloth_id')->toArray();
$cloth=Cloth::whereIn('id',$cart)->get();

dd($cloth);

  return view('orders.myorder');
}

}
