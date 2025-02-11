<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/images/';
            $file->move($path, $filename);

        }

        Product::create([
            
            'name' => $request['name'],
            'quantity' => $request['quantity'],
            'price' => $request['price'],
            'description' => $request['description'],
            'image' => $path . $filename,

        ]);
        
        return redirect()->route('products.index');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('products.show' , compact('product'));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('products.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , string $id)
    {
        $request -> validate([
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        $product = Product::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/images/';
            $file->move($path, $filename);

            if(File::exists($product->image)){
                File::delete($product->image);
            }
        }

        $product->update([
            
            'name' => $request['name'],
            'quantity' => $request['quantity'],
            'price' => $request['price'],
            'description' => $request['description'],
            'image' => $path . $filename,

        ]);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if(File::exists($product->image)){
            File::delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index');
    }
}
