<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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

    public function admin_show($id)
    {
        $data = []; //to be sent to the view
        $product = Product::findOrFail($id);
        
        $data["title"] = $product->getName();
        $data["product"] = $product;
        
        return view('product.admin_show')->with("data",$data);
    }

    public function admin_list_all()
    {
        $data = []; //to be sent to the view
        $data["title"] = 'Products';
        $data["products"] = Product::all()->sortByDesc('id');
        $data["filter"] = 'all';

        return view('product.admin_list')->with("data",$data);
    }

    public function all_list_cat($category)
    {
        $data = []; //to be sent to the view
        $data["title"] = ucwords($category) . ' Products';
        $data["products"] = Product::where('category', $category)->get()->sortByDesc('id');
        $data["filter"] = $category;

        return view('product.admin_list')->with("data",$data);
    }

    public function list_all()
    {
        $data = []; //to be sent to the view
        $data["title"] = 'Products';
        $data["products"] = Product::all()->sortByDesc('id');
        $data["filter"] = 'all';

        return view('product.list')->with("data",$data);
    }

    public function list_category($category)
    {
        $data = []; //to be sent to the view
        $data["title"] = ucwords($category) . ' Products';
        $data["products"] = Product::where('category', $category)->get()->sortByDesc('id');
        $data["filter"] = $category;

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
            "name" => "required|min:8|max:40",
            "description" => "required|min:128|max:256",
            "category" => [
                "required",
                Rule::in(['veggies','tubers','legumes','fruits','nuts','cereals']),
            ],
            "price" => "required|numeric|gt:0",
            "units" => "required|numeric|gt:0"

        ]);
        Product::create($request->only(["name","description","category","price","units"]));
        
        return back()->with('success','Item created successfully!');
    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();

        $data = []; //to be sent to the view
        $data["title"] = 'Products';
        $data["products"] = Product::all()->sortByDesc('id');
        $data["filter"] = 'all';

        return redirect()->route('product.admin_list')->with($data);
    }



}
