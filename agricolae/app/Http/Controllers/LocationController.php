<?php

namespace App\Http\Controllers;

use App\Location;
use App\Wishlist;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{

    public function show($id)
    {
        $data = []; //to be sent to the view
        $location = Location::findOrFail($id);
        
        $data["title"] = "Location";
        $data["product"] = $location;
        
        return view('location.show')->with("data",$data);
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Add Location";
        $data["products"] = Location::all();
        
        return view('farmer.product.create')->with("data",$data);
    }

    public function save(Request $request)
    {

        $request->validate(Location::validateRules());
        $user = User::findOrFail(Auth::user()->id);

        $location = new Location;
        $location->street_name = $request['street_name'];
        $location->street_number = $request['street_number'];
        $location->city = $request['city'];
        $location->state = $request['state'];
        $location->country = $request['country'];
        $location->user_id = $user->getId();
        $location->save();

        return redirect()->route('location.show', $location->getId());
    }

    public function edit($id)
    {
        $data = [];
        $data["title"] = "Edit Location";
        $location = Location::findOrFail($id);

        $user = User::findOrFail(Auth::user()->id);

        if ($location->getUserId() != $user->getId())
        {
            return redirect()->route('home.index')->with('deleted' ,"You cannot access this site"); 
        }

        $data['location'] = $location;

        return view('location.edit')->with(["data" => $data]);
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $user = User::findOrFail(Auth::user()->id);

        if ($location->getUserId() != $location->getId())
        {
            return redirect()->route('home.index')->with('deleted' ,"You cannot access this site"); 
        }

        $validate = $request->validate(Location::validateRules());

        if (!$validate)
        {
            return redirect()->route('home.index'); 
        }

        $location->update([
            'street_name' => $request['street_name'],
            'street_number' => $request['street_number'],
            'city' => $request['city'],
            'state' => $request['state'],
            'country' => $request['country'],
        ]);
        
        return redirect()->route('location.show', $id)->with('success', 'Review has been succesfully edited');

    }

    public function delete($id){
        $location = Location::find($id);

        $user = User::findOrFail(Auth::user()->id);

        if ($location->getUserId() != $user->getId())
        {
            return redirect()->route('home.index')->with('deleted' ,"You cannot access this site"); 
        }

        $location->delete();
        return redirect()->route('home.index')->with('deleted', 'Wish List has been deleted!');
    }
}
