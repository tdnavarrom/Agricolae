<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class WishlistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) 
        {
            if (Auth::user())
            {
                return $next($request);
            }

            return redirect()->route('home.index');
        });
    }

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

        $message = Lang::get('messages.wishlistSavedSuccess');

        return redirect()->route('wishlist.list')->with('success',$message);
    }

    public function delete($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        
        $message = Lang::get('messages.wishlistDeleteSuccess');

        return redirect()->route('wishlist.list')->with("success",$message);
    }
}
