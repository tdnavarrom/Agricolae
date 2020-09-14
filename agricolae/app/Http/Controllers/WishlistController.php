<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = 'Wishlist';

        if (!Auth::user())
        {
            return redirect()->route('home.index')->with('delted' ,"You cannot access this site"); 
        }
    
        $user = User::findOrFail(Auth::user()->id);
        $data["wishlists"] = Wishlist::where('user_id', $user->id)->get()->sortByDesc('id');

        return view('wishlist.list')->with("data",$data);
    }

    public function save(Request $request, Product $product)
    {

        $request->validate(Wishlist::validateRules());
        $user = User::findOrFail(Auth::user()->id);

        $wishlist = new Wishlist;
        $wishlist->title = $request['title'];
        $wishlist->product_id = $product->getId();
        $wishlist->user_id = $user->getId();
        $wishlist->save();

        return redirect()->route('wishlist.list');
    }

    public function delete($id){
        $wishlist = Wishlist::find($id);

        $user = User::findOrFail(Auth::user()->id);

        if ($wishlist->getUserId() != $user->getId())
        {
            return redirect()->route('home.index')->with('deleted' ,"You cannot access this site"); 
        }

        $wishlist->delete();
        return redirect()->route('wishlist.list')->with('deleted', 'Wish List has been deleted!');
    }
}
