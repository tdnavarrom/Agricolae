<?php

//Author: Tomas Navarro

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Item;
use App\User;
use App\Interfaces\FileGeneration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

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
        $data["filter"] = 'all';
        $data["products"] = Product::paginate(12);
        
        return view('product.list')->with("data",$data);
    }

    public function list_all_best_rating()
    {
        $data = []; //to be sent to the view
        $data["title"] = 'Products';
        $data["filter"] = 'all';
        $data["products"] = Product::orderByDesc('rating')->paginate(12);
        
        #dd($data["products"]);

        return view('product.list')->with("data",$data);
    }

    public function list_all_worst_rating()
    {
        $data = []; //to be sent to the view
        $data["title"] = 'Products';
        $data["filter"] = 'all';
        $data["products"] = Product::orderBy('rating')->paginate(12);
        
        //dd($data["products"]);

        return view('product.list')->with("data",$data);
    }

    public function list_category($category)
    {
        $data = []; //to be sent to the view
        $data["title"] = ucwords($category) . 'Products';
        $data["filter"] = $category;
        $data["products"] = Product::where('category', $category)->paginate(12);
       
        return view('product.list')->with("data",$data);
    }

    public function list_category_best_rating($category)
    {
        $data = []; //to be sent to the view
        $data["title"] = ucwords($category) . ' Products';
        $data["filter"] = $category;
        $data["products"] = Product::where('category', $category)->orderByDesc('rating')->paginate(12);
        
        //dd($data["products"]);

        return view('product.list')->with("data",$data);
    }

    public function list_category_worst_rating($category)
    {
        $data = []; //to be sent to the view
        $data["title"] = ucwords($category) . ' Products';
        $data["filter"] = $category;
        $data["products"] = Product::where('category', $category)->orderBy('rating')->paginate(12);
        
        //dd($data["products"]);

        return view('product.list')->with("data",$data);
    }

    public function list_by_search(Request $request)
    {
        $data = [];

        $name = $request['search_name'];
        $data["title"] = $name.' Search';
        $data["filter"] = 'search';
        $data["products"] = Product::where('name', 'like', '%'.$name.'%')->paginate(12);

        return view('product.list')->with("data", $data);
    }


    public function addToCart($id, Request $request)
    {
        if (Auth::user())
        {
            $data = []; //to be sent to the view
        
            $quantity = $request["quantity"];
            $products = $request->session()->get("products");
            $products[$id] = $quantity;
            $request->session()->put('products', $products);

            $message = Lang::get('messages.cartAddSuccess');

            return redirect()->route('product.list_all')->with("success", $message);
        }
        else
        {
            return view('auth.login');
        }
    }

    public function removeCart(Request $request)
    {
        if (Auth::user())
        {
            $request->session()->forget('products');

            $message = Lang::get('messages.cartDeleteSuccess');
    
            return back()->with("success", $message);
        }
        else
        {
            return view('auth.login');
        }
    }

    public function cart(Request $request)
    {
        $data = [];

        if (Auth::user())
        {
            $precioTotal = 0;
            $products = $request->session()->get("products");
            if ($products)
            {
                $keys = array_keys($products);
                $productsModels = Product::find($keys);
                $data["products"] = $productsModels;
                
                for ($i=0;$i<count($keys);$i++)
                {
                    $productActual = Product::find($keys[$i]);
                    $precioTotal = $precioTotal + $productActual->getPrice()*$products[$keys[$i]];
                }
                $data["total_price"] = $precioTotal;
                
                return view('product.cart')->with("data",$data);
            }
            else
            {
                $data["products"] = $products;
                return view('product.cart')->with("data",$data);
            }
        }
        else
        {
            return view('auth.login');
        }

    }

    public function buy(Request $request)
    {
        if (Auth::user())
        {
            $data = [];

            $order = new Order();

            $user_id = User::findOrFail(Auth::user()->getId());

            $order->setUserId($user_id->getId());
            $order->setTotal("0");
            $order->save();

            $precioTotal = 0;

            $products = $request->session()->get("products");
            if ($products)
            {
                $keys = array_keys($products);
                for ($i=0;$i<count($keys);$i++)
                {
                    $item = new Item();
                    $item->setProductId($keys[$i]);
                    $item->setOrderId($order->getId());
                    $item->setQuantity($products[$keys[$i]]);
                    $item->save();
                    $productActual = Product::find($keys[$i]);
                    $precioTotal = $precioTotal + $productActual->getPrice()*$products[$keys[$i]];
                }

                $order->setTotal($precioTotal);
                $order->save();

                $request->session()->forget('products');
            }

            $id = $order->getId();

            return redirect()->route("product.buy-made", $id);
        }
        else
        {
            return view('auth.login');
        }
    }

    public function buyMade($id)
    {
        if (Auth::user())
        {
            return view('product.buy')->with("id", $id);
        }
        else
        {
            return view('auth.login');
        }
    }

    public function generateFile(Request $request, $id)
    {  
        if (Auth::user())
        {
            $data = [];
            $choice = $request->input('format_choice');
            $fileGenerationInterface = app()->makeWith(FileGeneration::class, ['choice' => $choice]);

            $order = Order::findOrFail($id);
            $items = Item::where('order_id', $id)->get();

            $data["order"] = $order;
            $data["items"] = $items;

            return $fileGenerationInterface->store($data);
        }
        else
        {
            return view('auth.login');
        }
    }
    
}
