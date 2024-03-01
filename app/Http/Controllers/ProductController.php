<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();

    }

    public function sales()
    {
        return Product::where('status', 1)->get();

    }
    public function newproducts()
    {
        return Product::whereIn('id', [5, 6, 7, 8, 9, 10, 11, 12])->get();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate( [
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);
            return Product::create(
              $request->all()
            );
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $product = Product::where('slug', $slug)->first();
    
        if ($product) {
            $product->update($request->all());
            return response()->json($product);
        }
    
        return response()->json(['message' => 'Product not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
    
        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully']);
        }
    
        return response()->json(['message' => 'Product not found'], 404);
    }
        /**
     * Search 
     * 
     * @param \str $name
     * @return \Illuminate\Http\Response
     */
    public function search(string $name)
    {
        return Product::where('name', 'like','%'.$name.'%')->get();
    }
    public function readmore(string $name)
    {
        return Product::where('slug', '=', $name)->get();
    }
}
