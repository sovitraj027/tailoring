<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaiorProfileRequest;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Models\TailorProfile;

class TailorProfileController extends Controller
{
    use FileUploadTrait;

    public function profile()
    {  
        $tailor_profile = TailorProfile::first();     
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
        return redirect()->route('home')->with('success', 'Tailor Created Successfully!');
    }

    public function update(TaiorProfileRequest $request)
    {    
        $current_profile = auth()->user()->tailorprofile()->first();
         auth()->user()->tailorprofile()->update($request->except( 'name','image', '_token', '_method'));
         if ($request->hasFile('image')){
             
        if (!is_null($current_profile->logo)) {
            $this->fileUpload($current_profile, 'image', 'tailor-image', true);
        }
            $this->fileUpload($current_profile, 'logo', 'tailor-logo', false);  
        }

        if ($request->has('name')) {
            auth()->user()->update([
                'name' => $request->name
            ]);
        }
        return redirect()->route('home')->with('success', 'Tailor Updated Successfully!');
    }

}
