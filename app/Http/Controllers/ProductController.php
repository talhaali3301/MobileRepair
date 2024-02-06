<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand')->latest()->get();
        return Inertia::render('Products/Index', [
            'products' => $products,
        ]);

    }
    public  function add()  
    {
        $dropdownOptions = Brand::select('id', 'name')->get();

        return Inertia::render('Products/Add', [
            'dropdownOptions' => $dropdownOptions,
        ]);
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'description' => ['required', 'string'],
        ]);
        Product::updateOrCreate([
            'id' => $request->id
        ], [
            'brand_id' => $request->brand_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('products')->with('success', 'Product saved successfully');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        if($product){
            // Eager load the brand relationship
            // $product->load('brand');
            return Inertia::render('Products/Add' ,[
                'product' => $product
            ]);
        }
        
        return back();
    }
    public function delete($id){
        $product = Product::findOrFail($id);
        $product->delete();

    return redirect()->route('products')->with('success', 'Brand deleted successfully');
    }

}
