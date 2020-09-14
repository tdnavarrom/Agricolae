<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class FarmerHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) 
        {
            if (Auth::user()->getType() == "client")
            {
                return redirect()->route('home.index');
            }

            return $next($request);
        });
    }

    public function index()
    {
        $data = [];

        $user = User::findOrFail(Auth::user()->id);
        $data["user"] = $user;

        return view('farmer.index')->with("data", $data);
    }
}

?>