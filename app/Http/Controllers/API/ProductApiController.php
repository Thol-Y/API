<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Add this line to import the Product model

class ProductApiController extends Controller
{
    
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'message' => 'success',
            'data' => $products
        ],200);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = 'uploads/images/';
            $file->move($path, $filename);
        }
        $product = Product::create($request->all());
        return response()->json([
            'message' => 'Product create successfully',
            'data' => $product
        ],201);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if($product){
            return response()->json([
                'message' => 'success',
                'data' => $product
            ],200);
        }else{
            return response()->json([
                'message' => 'Product not found',
            ],404);
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if($product){
            $request->validate([
                'name' => 'required',
                'quantity' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image' => 'required'
            ]);
            
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = time().'_'.$file->getClientOriginalName();
                $path = 'uploads/images/';
                $file->move($path, $filename);
            }
            $product->update($request->all());
            return response()->json([
                'message' => 'Product updated successfully',
                'data' => $product
            ],200);
        }else{
            return response()->json([
                'message' => 'Product not found',
            ],404);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if($product){
            $product->delete();
            return response()->json([
                'message' => 'Product deleted successfully',
            ],200);
        }else{
            return response()->json([
                'message' => 'Product not found',
            ],404);
        }
    }
}
