<?php

//Author: Carlos Mesa

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Location;
use App\User;
use Illuminate\Support\Facades\Lang;

class LocationController extends Controller
{       
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) 
        {
            if (!Auth::user())
            {
                return redirect()->route('home.index');
            }

            return $next($request);
        });
    }

    public function list()
    {
        $data = []; //to be sent to the view

        $id = Auth::user()->getId();

        $location = Location::where('user_id', $id)->get();
        
        $data["title"] = "Location";
        $data["locations"] = $location;
        
        return view('location.list')->with("data",$data);
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Add Location";
        
        return view('location.create')->with("data",$data);
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

        $message = Lang::get('messages.locationCreatedSuccess');

        return redirect()->route('location.list')->with("success",$message);
    }

    public function edit($id)
    {
        $data = [];
        $data["title"] = "Edit Location";

        $location = Location::findOrFail($id);
        $data['locations'] = $location;

        return view('location.edit')->with("data",$data);
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $request->validate(Location::validateRules());

        $location->update([
            'street_name' => $request['street_name'],
            'street_number' => $request['street_number'],
            'city' => $request['city'],
            'state' => $request['state'],
            'country' => $request['country'],
        ]);
        
        $message = Lang::get('messages.locationEditSuccess');

        return redirect()->route('location.list')->with("success",$message);

    }

    public function delete($id)
    {
        $location = Location::find($id);

        $location->delete();

        $message = Lang::get('messages.locationDeleteSuccess');

        return redirect()->route('location.list')->with("success",$message);
    }
}
