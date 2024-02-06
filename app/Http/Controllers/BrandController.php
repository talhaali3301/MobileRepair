<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Brand;



class BrandController extends Controller
{
    public function index()
{
        $brands = Brand::latest()->get();

        return Inertia::render('Brands/Index', [
            'brands' => $brands,
        ]);
}

    /**
     * Show the form to create a new brand.
     */
    public function add()
{
         return Inertia::render('Brands/Add');
}
    
    public function edit($id)
{
        $brand = Brand::find($id);
        if($brand){
            return Inertia::render('Brands/Add' ,[
                 "brand" => $brand
            ]);
         }
         return back();
}

    public function save(Request $request)
{
        $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'description' => ['required', 'string'],
            // 'brandLogo' => ['required', 'mimes:jpg,png'],
        ]);
    
        // if ($request->hasFile('brandLogo')) {
        //     $logoPath = $request->file('brandLogo')->store('public/logos');
        //     $brandData['logo_path'] = str_replace("public", "/storage", $logoPath);
        // }
        Brand::updateOrCreate([
            'id' => $request->id
        ], [
            'name' => $request->name,
            'description' => $request->description,
            'path' => $request->description,
        ]);

        return redirect()->route('brands')->with('success', 'Brand saved successfully');

        // Brand::updateOrCreate([
        //     'id' => $request->id
        // ], [
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     // 'path' => str_replace("public", "/storage", $path)
        // ]);
}

    public function delete($id)
{
    $brand = Brand::findOrFail($id);
    $brand->delete();

    return redirect()->route('brands')->with('success', 'Brand deleted successfully');
}


}
