<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaiorProfileRequest;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Models\TailorProfile;
use Illuminate\Support\Facades\Auth;

class TailorProfileController extends Controller
{
    use FileUploadTrait;

    public function profile()
    {  
        $tailor_profile = TailorProfile::where('user_id',Auth()->user()->id)->first();     
        if (!is_null($tailor_profile)) {        
            return view('tailor.profile',[
            'tailor_profile'=>$tailor_profile]);
        }
        return view('tailor.profile',
        [
            'tailor_profile'=>$tailor_profile ,
            ]);
    }

    public function store(TaiorProfileRequest $request)
    {   
        $tailor_profile = auth()->user()->tailorprofile()->create($request->except('image', '_token'));
        if ($request->hasFile('image')) {
            $this->fileUpload($tailor_profile, 'image', 'tailor-image', false);
        }
        if ($request->has('name')) {
            auth()->user()->update([
                'name' => $request->name
            ]);
        }
        return redirect()->route('home')->with('success', 'Profile Created Successfully!');
    }

    public function update(TaiorProfileRequest $request)
    {    
        // dd($request->all());
        $current_profile = auth()->user()->tailorprofile()->first();
         auth()->user()->tailorprofile()->update($request->except( 'name','image', '_token', '_method'));
         if ($request->hasFile('image')){
        if (!is_null($current_profile->image)) {
           
            $this->fileUpload($current_profile, 'image', 'tailor-image', true);
        }
            $this->fileUpload($current_profile, 'image', 'tailor-image', false);  
        }

        if ($request->has('name')) {
            auth()->user()->update([
                'name' => $request->name
            ]);
        }
        return redirect()->route('home')->with('success', 'Tailor Updated Successfully!');
    }

    public function viewDetail($tailor_id){

        $rating = Rating::where('user_id', auth()->id())->where('tailor_id', $tailor_id)->first();
        if ($rating == null) {
            $rating = 0;
        }
        return view('front-end.rating',[
            'tailor'=>TailorProfile::where('id',$tailor_id)->first(),
            'rating' => $rating,
            'avg_rating' => Rating::where('tailor_id', $tailor_id)->pluck('rating')->avg()

        ]
    );
    }

}
