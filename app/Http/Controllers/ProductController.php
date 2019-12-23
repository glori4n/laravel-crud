<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:products',
            'description' => 'required',
        ]);
        
        if($validatedData){
            Product::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
            ]);
        }

        return redirect('dashboard');
    }

    public function read ()
    {

        $products = Product::all()->count();
        return view('products', compact('products'));

    }
}
