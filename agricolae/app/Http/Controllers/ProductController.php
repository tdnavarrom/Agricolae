<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{

    public function show($id)
    {
        $data = []; //to be sent to the view
        $product = Product::findOrFail($id);
        
        $data["title"] = $product->getName();
        $data["product"] = $product;
        
        return view('product.show')->with("data",$data);
    }

    public function list($category)
    {
        $data = []; //to be sent to the view
        $data["title"] = "Products";
        $data["products"] = Product::where('category', $category)->get()->sortByDesc('id');

        return view('product.list')->with("data",$data);
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create Product";
        $data["products"] = Product::all();
        
        return view('product.create')->with("data",$data);
    }

    public function save(Request $request)
    {

        $request->validate([
            "name" => "required",
            "description" => "required",
            "category" => "required",
            "price" => "required|numeric|gt:0",
            "units" => "required|numeric|gt:0"

        ]);
        Product::create($request->only(["name","description","category","price","units"]));
        
        return back()->with('success','Item created successfully!');
    }



}
