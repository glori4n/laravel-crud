<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:products',
            'description' => 'required',
        ]);
        
        Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
        ]);

        $message = 'Product '.$validatedData['name'].' created successfully.';
        session(['message' => $message]);

        return redirect('dashboard');
    }

    public function read()
    {

        $products = Product::all()->count();
        return view('products', compact('products'));

    }

    public function edit(Request $request)
    {

        $id = $request->id;
        $product = Product::where('id', $id)->first();
        
        return view('products-edit', compact('id', 'product'));

    }

    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $product = Product::find($id);

        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->update();

        $message = 'Product '.$id.' updated successfully.';
        session(['message' => $message]);
        
        return redirect('dashboard');

    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        $message = 'Product '.$product->name.' deleted successfully.';
        session(['message' => $message]);
        
        return redirect('dashboard');
    }
}
