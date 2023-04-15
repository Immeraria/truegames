<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    

    public function index()
    {
        $products = Basket::all();

        return view('basket.index', compact('products'));
    }

    public function store(Request $request)
    {
        $product = Product::find($request->id);
        $image = Image::find($request->id);

        Basket::create([
            'name' => $product->name,
            'price' => $product->price,  
            'description' => $product->description,
            'image' => $image->url,
        ]);
    }
}
