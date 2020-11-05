<?php

//Author: Santiago Pulgarin

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Product;
use Illuminate\Support\Facades\Lang;
use App\User;

class FarmerProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) 
        {
            if (Auth::user()->getType() == "client")
            {
                return redirect()->route('home.index');
            }

            return $next($request);
        });
    }

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

        $user = User::findOrFail(Auth::user()->id);

        $data["products"] = Product::where('user_id', $user->id)->paginate(12);
        $data["filter"] = 'all';

        return view('farmer.product.list')->with("data",$data);
    }

    public function list_cat($category)
    {
        $data = []; //to be sent to the view
        $data["title"] = ucwords($category) . ' Products';

        $user = User::findOrFail(Auth::user()->id);
        $data["products"] = Product::where(['category' => $category, 'user_id' => $user->id])->paginate(12);
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

        $storeInterface = app(ImageStorage::class);
        $name = $storeInterface->store_product_image($request);

        $product = new Product;
        $product->user_id = $user->getId();
        $product->name = $request["name"];
        $product->description = $request["description"];
        $product->category = $request["category"];
        $product->price = $request["price"];
        $product->units = $request["units"];
        $product->rating = 0;
        $product->image = $name;
        $product->save();

        $message = Lang::get('messages.productCreateSuccess');
        
        return redirect()->route('farmer.product.list')->with("success", $message);
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

        $request->validate(Product::updateRules());

        $product = Product::findOrFail($id);

        if ($request->hasFile('image'))
        {
            $storeInterface = app(ImageStorage::class);
            $name = $storeInterface->store_product_image($request);

            $product->update([
                'name' => $request['name'],
                'description' => $request['description'],
                'category' => $request['category'],
                'price' => $request['price'],
                'units' => $request['units'],
                'image' => $name,
            ]);
        }
        else 
        {
            $product->update($request->except('image'));
        }

        $message = Lang::get('messages.productEditSuccess');

        return redirect()->route('farmer.product.list')->with("success", $message);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        $message = Lang::get('messages.productDeleteSuccess');

        return redirect()->route('farmer.product.list')->with("success", $message);
    }



}