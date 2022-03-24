<?php

namespace App\Http\Controllers;

use App\Http\Requests\TailorRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TailorController extends Controller
{
    public function index()
    {
        return view('tailor.index',[
            'tailors'=>User::where('user_type','1')->latest()->get()
        ]
    );
    }

    public function create(){
        return view('tailor.create');
    }

    public function edit(User $tailor)
    {
        return view('tailor.edit',[
            'tailor'=>$tailor
        ]);
    }
    
   
    
    public function store(TailorRequest $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
         User::create($data);
         return redirect()->route('tailors.index')->with('success', 'Tailor Created Successfully!');
    }

    public function update(TailorRequest $request, User $tailor) 
    {  
        $tailor->update($request->except('password'));        
        if ($request->has('password')) {
            $tailor->update([
                'password' => bcrypt($request->password)
            ]);
        }
            return redirect()->route('tailors.index')->with('success', 'Tailor Updated Successfully!');

    }

    public function destroy(User $tailor)
    {
        $tailor->delete();
        return redirect()->route('tailors.index')->with('error', 'Tailor Deleted Successfully!');
    }
}
