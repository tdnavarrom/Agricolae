<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Review;
use App\User;
use Illuminate\Support\Facades\Auth;

class FarmerReviewController extends Controller
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
        $review = Review::findOrFail($id);
        $product = Product::findOrFail($review->getProductId());
        $user = User::findOrFail(Auth::user()->id);

        if ($product->getUserId() != $user->getId())
        {
            return redirect()->route('home.index')->with('delted' ,"You cannot access this site"); 
        }
        
        $data["title"] = "Review";
        $data["review"] = $review;
        $data["user"] = $user;
        $data["product"]["id"]= $product->getId();
        $data["product"]["name"]= $product->getName();

        return view('farmer.review.show')->with("data",$data);
    }

}