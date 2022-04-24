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
            return redirect()->back();
    
          }
      }

      public function cashManagement(){
        return view('cashManagement.index',[
          'cashpayment'=>Cash::latest()->get()
        ]);
      }

      public function paid(Cash $id)
    {
        $id->update([
            'status' => 1
        ]);

        return redirect()->route('paywithcash')->with('success', 'Paid successfully!');
    }

    public function unpaid(Cash $id)
    {
      
        $id->update([
            'status' => 0
        ]);

        return redirect()->route('paywithcash')->with('error', 'Unpaid!');
    }
}
