<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;

class FarmerProductController extends Controller
{

    public function show($id)
    {
        $data = []; //to be sent to the view
        $product = Product::findOrFail($id);
        
        $data["title"] = $product->getName();
        $data["product"] = $product;
        
        return view('farmer.product.show')->with("data",$data);
    }

    public function list_all()
    {
        $data = []; //to be sent to the view
        $data["title"] = 'Products';
        $data["products"] = Product::all()->sortByDesc('id');
        $data["filter"] = 'all';

        return view('farmer.product.list')->with("data",$data);
    }

    public function list_cat($category)
    {
        $data = []; //to be sent to the view
        $data["title"] = ucwords($category) . ' Products';
        $data["products"] = Product::where('category', $category)->get()->sortByDesc('id');
        $data["filter"] = $category;

        return view('farmer.product.list')->with("data",$data);
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create Product";
        $data["products"] = Product::all();
        
        return view('farmer.product.create')->with("data",$data);
    }

    public function save(Request $request)
    {

        $request->validate(Product::validateRules());

        $product = new Product;
        $product->name = $request["name"];
        $product->description = $request["description"];
        $product->category = $request["category"];
        $product->price = $request["price"];
        $product->units = $request["units"];
        $product->save();

        
        return redirect()->route('farmer.product.show', $product->id);
    }

    public function edit($id)
    {
        $data = [];
        $data["title"] = "Edit Product";
        
        $product = Product::findOrFail($id);
        $data['product'] = $product;

        return view('farmer.product.edit')->with(["data" => $data]);
    }

    public function update(Request $request, $id)
    {
        $product = $product = Product::findOrFail($id);
        $validate = $request->validate(Product::validateRules());

        if (!$validate)
        {
            return redirect()->route('farmer.product.show', $id); 
        }

        $product->update($request->only(["name","description","category","price","units"]));
        
        return redirect()->route('farmer.product.show', $id);

    }

    public function delete($id){
        $product = Product::find($id);
        $product->delete();

        $data = []; //to be sent to the view
        $data["title"] = 'Products';
        $data["products"] = Product::all()->sortByDesc('id');
        $data["filter"] = 'all';

        return redirect()->route('farmer.product.list')->with($data);
    }



}