<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Review;
use App\User;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Support\Facades\Auth;

//use App\User;

class ReviewController extends Controller
{

    public function create(Product $product)
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create a Review";
        $data['product'] = $product;
        
        return view('review.create')->with("data",$data);
    }

    public function save(Request $request, Product $product)
    {

        $request->validate(Review::validateRules());
        $user = User::findOrFail(Auth::user()->id);

        $review = new Review;
        $review->user_id = $user->getId();
        $review->product_id = $product->getId();
        $review->title = $request["title"];
        $review->description = $request["description"];
        $review->score = $request["score"];
        
        $review->save();

        return redirect()->route('product.show' ,$product->getId());
    }

    public function edit($id)
    {
        $data = [];
        $data["title"] = "Edit Review";
        $review = Review::findOrFail($id);

        $user = User::findOrFail(Auth::user()->id);

        if ($review->getUserId() != $user->getId())
        {
            return redirect()->route('home.index')->with('deleted' ,"You cannot access this site"); 
        }

        $data['review'] = $review;

        return view('review.edit')->with(["data" => $data]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(Review::updateRules());

        $review = Review::findOrFail($id);

        $user = User::findOrFail(Auth::user()->id);

        if ($review->getUserId() != $user->getId())
        {
            return redirect()->route('home.index')->with('deleted' ,"You cannot access this site"); 
        }

        $validate = $request->validate(Review::validateRules());

        if (!$validate)
        {
            return redirect()->route('product.show', $review->getProductId()); 
        }

        $review->update($request->only(["title","description","score"]));
        
        return redirect()->route('review.show', [$id, $review->product_id])->with('success', 'Review has been succesfully edited');

    }

    public function delete($id){
        $review = Review::find($id);

        $user = User::findOrFail(Auth::user()->id);

        if ($review->getUserId() != $user->getId())
        {
            return redirect()->route('home.index')->with('deleted' ,"You cannot access this site"); 
        }

        $review->delete();
        return redirect()->route('review.list')->with('deleted', 'Review has been deleted!');
    }


}
