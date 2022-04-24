<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Http\Requests\ClothRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Cloth;
use App\Models\Color;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ClothController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return view('cloth.index', [
            'clothes' => Cloth::latest()->get()

        ]);
    }


    public function create()
    {
        $categories = Category::latest()->get();
        $colors = Color::latest()->get();
        if ($categories->count() == 0) {
            return redirect()->back()->with('error', 'Categories is empty please first add category');
        } elseif ($colors->count() == 0) {
            return redirect()->back()->with('error', 'Color is empty please first add color');
        } else {
            return view('cloth.create', [
                'categories' => $categories,
                'colors' => $colors
            ]);
        }
    }

    public function store(ClothRequest $request)
    {

        $cloth = Cloth::create($request->except('image', '_token'));
        if ($request->hasFile('image')) {
            $this->fileUpload($cloth, 'image', 'cloth-image', false);
        }
        $cloth->categories()->attach($request->category_id);
        $cloth->colors()->attach($request->color_id);
        return redirect()->route('clothes.index')->with('success', 'Cloth Added Successfully!');
    }


    public function show($id)
    {
        return view('cloth.show', [
            'cloth' => Cloth::where('id', $id)->first()
        ]);
    }


    public function edit($id)
    {
        $selected_category = array();
        $clothes = Cloth::where('id', $id)->first();
        foreach ($clothes->categories as $category) {
            array_push($selected_category, $category->id);
        }

        return view('cloth.edit', [
            'cloth' => Cloth::where('id', $id)->first(),
            'categories' => Category::latest()->get(),
            'colors' => Color::latest()->get(),
            'selected_category' => $selected_category
        ]);
    }


    public function update(ClothRequest $request, $id)
    {
        $cloth = cloth::where('id', $id)->first();
        Cloth::where('id', $id)->update($request->except('image', '_token', '_method', 'category_id', 'color_id'));
        if ($request->hasFile('image')) {
            $this->fileUpload($cloth, 'image', 'cloth-image', false);
        }
        $cloth->categories()->sync($request->category_id);
        $cloth->colors()->sync($request->color_id);

        return redirect()->route('clothes.index')->with('success', 'Cloth Updated Successfully!');
    }


    public function destroy($id)
    {
        $cloth = Cloth::where('id', $id)->first();
        $cloth->categories()->detach();
        $cloth->colors()->detach();
        $cloth->delete();
        return redirect()->route('clothes.index')->with('error', 'Cloth Delete Successfully!');
    }
}
