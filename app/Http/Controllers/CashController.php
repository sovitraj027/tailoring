<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cash;
use Illuminate\Http\Request;

class CashController extends Controller
{
      public function store(Request $request){
          if(cash::where('user_id',$request->user_id)->where('cloth_id',$request->cloth_id)->where('quantity',$request->quantity)->exists()){
            return redirect()->back();
          }
          else{
            Cash::create($request->all());
            Cart::where('user_id',$request->user_id)->where('cloth_id',$request->cloth_id)->where('quantity',$request->quantity)->delete();
            return redirect()->back('');
    
          }
      }
}
