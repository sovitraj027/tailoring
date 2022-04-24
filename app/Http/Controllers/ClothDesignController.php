<?php

namespace App\Http\Controllers;

use App\Http\Requests\DesignRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\ClothDesign;
use App\Traits\FileUploadTrait;

class ClothDesignController extends Controller
{
    use FileUploadTrait;

    public function clothDesign($id)
    {
        return view('cloth.design.index', [
            'designs' => ClothDesign::where('cloth_id', $id)->get(),
            'id' => $id
        ]);
    }

    //get create form for selected cloth
    public function createDesign($id)
    {
        return view('cloth.design.create', [
            'id' => $id
        ]);
    }

    public function store(DesignRequest $request)
    {
        $clothDesign = ClothDesign::create($request->except('image', '_token'));

        if ($request->hasFile('image')) {
            $this->fileUpload($clothDesign, 'image', 'cloth-designs', false);
        }
        return redirect()->route('clothes.index')->with('success', 'Design Added Successfully!');
    }


    public function Edit($id)
    {
        return view('cloth.design.edit', [
            'design' => ClothDesign::where('id', $id)->first()
        ]);
    }

    public function Update(DesignRequest $request, $id)
    {
        $clothDesign = ClothDesign::where('id', $id)->first();
        ClothDesign::where('id', $id)->update($request->except('image', '_token', '_method'));
        if ($request->hasFile('image')) {
            $this->fileUpload($clothDesign, 'image', 'cloth-designs', false);
        }
        return redirect()->route('clothes.index')->with('success', 'Design Updated Successfully!');
    }


    public function destroy($id)
    {
        $clothDesign = ClothDesign::where('id', $id)->first();
        $clothDesign->delete();
        return redirect()->route('clothes.index')->with('error', 'Design delete Successfully!');
    }
}
