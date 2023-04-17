<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function index()
    {
        $images = Image::all();
        $baskets = Basket::all();
        $products = Product::all();
        $basket = BasketController::getProducts();
        $price = BasketController::getProducts()->pluck('price')->toArray();

        return view('basket.index', compact('images', 'baskets', 'products', 'basket', 'price'));
    }

    public function getProducts()
    {
        return Product::all()->whereIn('id', Basket::all()->where('user_id', Auth::user()->id)->pluck('product_id'));
    }

    public function store(Request $request)
    {
        Basket::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'count' => 1,
        ]);

        return redirect()->route('catalog.index');
    }

    public function destroy(Request $request)
    {
        Basket::where('product_id', $request->product_id)->where('user_id', $request->user_id)->delete();
        return redirect()->route('catalog.index');
    }
}
