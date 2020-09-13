<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Cache\RedisTaggedCache;

class WishlistController extends Controller
{

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = 'WishList';
        $data["wishlists"] = WishList::all()->sortByDesc('id');

        return view('wishlist.list')->with("data",$data);
    }

    public function save(Request $request, Product $product)
    {

        $request->validate(WishList::validateRules());

        $wishlist = new WishList;
        $wishlist->title = $request["title"];
        $wishlist->product_id = $product->getId();
        $wishlist->save();

        return redirect()->route('wishlist.list');
    }

    public function delete($id){
        $wishlist = WishList::find($id);
        $wishlist->delete();
        return redirect()->route('wishlist.list')->with('deleted', 'Wish List has been deleted!');
    }
}
