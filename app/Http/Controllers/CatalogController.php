<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $images = Image::all();
        $products = Product::all();
        return view('catalog.index', compact('products', 'images'));
    }
    
    public function create(Request $request)
    {
        $products = Product::all();
        $categories = Category::all();
        return view('catalog.create', compact('products', 'categories'));
    }
}