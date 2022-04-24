<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EsewaController extends Controller
{
    public function verifyPayment(Request $request){
        dd('here');
        $status=$request->q;
        dd($status);
    }
}
