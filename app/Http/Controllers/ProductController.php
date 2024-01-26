<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $product = Product::paginate(5);
        return response()->json([
            'products' => $product,
            'status' => 200,
        ]);
    }
    public function show($id){
        $product = Product::find($id);
        return response()->json([
            'product' => $product,
            'status' => 200,
        ]);
    }
    public function store(Request $request){
        $product = Product::create([
             $request->only('title', 'description', 'price', 'image'),
        ]);
        return response()->json([
            'product' => $product,
            'status' => 201,
        ]);
    }
    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->update($request->only('title', 'description', 'price', 'image'));
        return response()->json([
            'product' => $product,
            'status' => 200,
        ]);
    }
    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return response()->json([
            'status' => 200,
        ]);
    }
}
