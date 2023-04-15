<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{ 
    public function store(Request $request)
    {
        Category::create([
            'category' => $request->category,
        ]);
        return redirect()->route('catalog.create');
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('catalog.create');
    }
}