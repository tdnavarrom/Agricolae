<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class FarmerProductController extends Controller
{

    public function show($id)
    {
        $data = []; //to be sent to the view
        $product = Product::findOrFail($id);

        $user = User::findOrFail(Auth::user()->id);

        if ($product->getUserId() != $user->getId())
        {
            return redirect()->route('home.index')->with('delted' ,"You cannot access this site"); 
        }
        
        $data["title"] = $product->getName();
        $data["product"] = $product;
        
        return view('farmer.product.show')->with("data",$data);
    }

    public function list_all()
    {
        $data = []; //to be sent to the view
        $data["title"] = 'Products';

        $user = User::findOrFail(Auth::user()->id);

        $data["products"] = Product::where('user_id', $user->id)->get()->sortByDesc('id');
        $data["filter"] = 'all';

        return view('farmer.product.list')->with("data",$data);
    }

    public function list_cat($category)
    {
        $data = []; //to be sent to the view
        $data["title"] = ucwords($category) . ' Products';
        $user = User::findOrFail(Auth::user()->id);
        $data["products"] = Product::where(['category' => $category, 'user_id' => $user->id])->get()->sortByDesc('id');
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
        $user = User::findOrFail(Auth::user()->id);

        $product = new Product;
        $product->user_id = $user->getId();
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

        $user = User::findOrFail(Auth::user()->id);

        if ($product->getUserId() != $user->getId())
        {
            return redirect()->route('home.index')->with('delted' ,"You cannot access this site"); 
        }

        $data['product'] = $product;

        return view('farmer.product.edit')->with(["data" => $data]);
    }

    public function update(Request $request, $id)
    {
        $product = $product = Product::findOrFail($id);
        
        $user = User::findOrFail(Auth::user()->id);

        if ($product->getUserId() != $user->getId())
        {
            return redirect()->route('home.index')->with('delted' ,"You cannot access this site"); 
        }

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
        $user = User::findOrFail(Auth::user()->id);

        if ($product->getUserId() != $user->getId())
        {
            return redirect()->route('home.index')->with('delted' ,"You cannot access this site"); 
        }

        $product->delete();

        $data = []; //to be sent to the view
        $data["title"] = 'Products';
        $data["products"] = Product::all()->sortByDesc('id');
        $data["filter"] = 'all';

        return redirect()->route('farmer.product.list')->with($data);
    }



}