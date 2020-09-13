<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Product;
use App\User;
use Illuminate\Support\Facades\Lang;

class FarmerProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) 
        {
            if (Auth::user()->getUserType() == "client")
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

        $name = "";
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/products_images/', $name);
        }

        $product = new Product;
        $product->user_id = $user->getId();
        $product->name = $request["name"];
        $product->description = $request["description"];
        $product->category = $request["category"];
        $product->price = $request["price"];
        $product->units = $request["units"];
        $product->image = $name;
        $product->save();
        
        return redirect()->route('farmer.product.list');
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

        $request->validate(Product::updateRules());

        $product = Product::findOrFail($id);
        
        $user = User::findOrFail(Auth::user()->id);

        if ($product->getUserId() != $user->getId())
        {
            return redirect()->route('home.index')->with('delted' ,"You cannot access this site"); 
        }

        
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/products_images/', $name);

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

    public function delete($id){
        $product = Product::find($id);
        $user = User::findOrFail(Auth::user()->id);

        if ($product->getUserId() != $user->getId())
        {
            return redirect()->route('home.index')->with('delted' ,"You cannot access this site"); 
        }

        $product->delete();

        return redirect()->route('farmer.product.list');
    }



}