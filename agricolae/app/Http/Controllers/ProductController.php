<?php

//Author: Tomas Navarro

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Item;
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
        $request->session()->forget('products');

        $message = Lang::get('messages.cartDeleteSuccess');

        return back()->with("success", $message);
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
        $order = new Order();
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

        return redirect()->route('product.list_all');
    }

}
