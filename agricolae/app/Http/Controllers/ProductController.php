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

}
