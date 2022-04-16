<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Cloth;
use App\Models\TailorProfile;

class WelcomeController extends Controller
{
    public function index(){
        return view('front-end.index',[
            'clothes'=>Cloth::latest()->get(),
            'tailors'=>TailorProfile::latest()->get()
        ]);
    }

    public function getAllitem(){
        return view('front-end.index',[
            'clothes'=>Cloth::latest()->get()
        ]);
    }

    public function getMensitem(){
        return view('front-end.index',[
            'clothes'=>Cloth::where('type','men')->get()
        ]);
    }

    public function getWomenitem(){
        return view('front-end.index',[
            'clothes'=>Cloth::where('type','women')->get()
        ]);
    }
    
    public function getChildrenitem(){
        return view('front-end.index',[
            'clothes'=>Cloth::where('type','children')->get()
        ]);
    }

    public function getElderitem(){
        return view('front-end.index',[
            'clothes'=>Cloth::where('type','elder')->get()
        ]);
    }

    public function about(){      
        return view('front-end.about',[
      'tailors'=>TailorProfile::latest()->get(),
        ]);
    }

    public function productDetail($item_id){
        $cloth=Cloth::where('id',$item_id)->first();
        $clothtype=Cloth::where('type',$cloth->type)->get();
        return view('cloth.detail',[
            'cloth'=>$cloth,
            'clothtype'=>$clothtype
        ]);

        }


}
