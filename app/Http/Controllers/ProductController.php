<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', ],
            'description' => ['required', ],
            'price' => ['required', ],
            'brand' => ['required', ],
            'count' => ['required', ],
            'images' => ['required', ],
        ]);

        $product = Product::create([
            'category' => $request->category,
            'shortname' => $request->shortname,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'brand' => $request->brand,
            'color' => $request->color,
            'count' => $request->count,
        ]);

        foreach ($request->file('images') as $image) {
            Image::create([
                'category' => $request->category,
                'url' => Storage::disk('public')->put('images/products', $image),
                'product_id' => $product->id,
            ]);
        }

        return redirect()->route('catalog.create');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', ],
            'description' => ['required', ],
            'price' => ['required', ],
            'brand' => ['required', ],
            'count' => ['required', ],
            'images' => ['required', ],
        ]);

        Product::find($id)->update([
            'category' => $request->category,
            'shortname' => $request->shortname,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'brand' => $request->brand,
            'color' => $request->color,
            'count' => $request->count,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                Image::find($id)->update([
                    'category' => $request->category,
                    'url' => Storage::disk('public')->put('images/products', $image),
                    'product_id' => $id,
                ]);
            }
        }

        return redirect()->route('catalog.create');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('catalog.create');
    }
}
