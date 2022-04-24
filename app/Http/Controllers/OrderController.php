<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\Cloth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{


    public function addToCart(CartRequest $request, $id){
        $randomNumber = random_int(1000, 9999);
       
        if( Cart::where('category_id',$request->category_id)->where('user_id',Auth()->user()->id)->where('cloth_id',$id)->exists()){
            Cart::where('category_id',$request->category_id)->where('user_id',Auth()->user()->id)->where('cloth_id',$id)->increment('quantity',$request->quantity);
            return redirect()->route('welcome')->with('success', 'Successfully!');
        }
        else{
           
            $requestData=[
                'category_id'=>$request->category_id,
                'user_id'=>Auth()->user()->id,
                'order_number'=>$randomNumber,
                'quantity'=>$request->quantity,
                'cloth_id'=>$id
            ];
            Cart::create($requestData);
            return redirect()->route('myorder')->with('success', 'Successfully!');
        }
  
    }
    
   public function myOrder(){
    $cart=Cart::where('user_id',Auth()->user()->id)->pluck('cloth_id')->toArray();
    $cloth=Cloth::whereIn('id',$cart)->get();
    // foreach ($cloth as $item){
    //     dd($item->cart->category);
    // }

  
  return view('order.myorder',[
      'clothes'=>$cloth,
      'cart'=>Cart::where('user_id',Auth()->user()->id)->get()
      ]);
    }

    public function removeCart($id){
       $cart=Cart::find($id);
       $cart->delete();
       return redirect()->back();

    }

}
