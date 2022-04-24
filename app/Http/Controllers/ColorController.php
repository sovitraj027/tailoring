<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function index()
    {
        return view(
            'color.index',
            [
                'colors' => Color::latest()->get()
            ]
        );
    }

    public function create()
    {
        return view('color.create');
    }

    public function edit(Color $color)
    {
        return view('color.edit', compact('color'));
    }

    public function store(ColorRequest $request)
    {

        Color::create($request->validated());
        return redirect()->route('colors.index')->with('success', 'Color Created Successfully!');
    }

    public function update(ColorRequest $request, Color $color)
    {
        $color->update($request->validated());
        return redirect()->route('colors.index')->with('success', 'Color Updated Successfully!');
    }

    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('colors.index')->with('error', 'Color Deleted Successfully!');
    }
}
