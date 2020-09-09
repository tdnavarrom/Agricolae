<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Review;
use Illuminate\Cache\RedisTaggedCache;

//use App\User;

class ReviewController extends Controller
{

    public function show($id)
    {
        $data = []; //to be sent to the view
        $review = Review::findOrFail($id);
        $product = Product::findOrFail($review->getProductId());
        //$user = User::findOrFail($review->getUserId());
        
        $data["title"] = "Review";
        $data["review"] = $review;
        $data["product"]["id"]= $product->getId();
        $data["product"]["name"]= $product->getName();

        return view('review.show')->with("data",$data);
    }

    public function admin_show($id)
    {
        $data = []; //to be sent to the view
        $review = Review::findOrFail($id);
        $product = Product::findOrFail($review->getProductId());
        //$user = User::findOrFail($review->getUserId());
        
        $data["title"] = "Review";
        $data["review"] = $review;
        $data["product"]["id"]= $product->getId();
        $data["product"]["name"]= $product->getName();

        return view('review.admin_show')->with("data",$data);
    }

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Reviews";
        $data["reviews"] = Review::all()->sortByDesc('id');

        return view('review.list')->with("data",$data);
    }

    public function create(Product $product)
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create a Review";
        $data['product'] = $product;
        
        return view('review.create')->with("data",$data);
    }

    public function save(Request $request, Product $product)
    {

        $request->validate([
            "title" => 'required|min:8|max:40',
            "description" => "required|min:128|max:256",
            "score" => "required|numeric|gt:0|lt:6"
        ]);

        $review = new Review;
        $review->title = $request["title"];
        $review->description = $request["description"];
        $review->score = $request["score"];
        $review->product_id = $product->id;
        $review->save();

        return redirect()->route('product.show' ,$product->id);
    }

    public function delete($id){
        $review = Review::find($id);
        $review->delete();
        return redirect()->route('review.list')->with('deleted', 'Review has been deleted!');
    }


}
