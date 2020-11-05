<?php

//Author: Santiago Pulgarin

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Interfaces\ImageStorage;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

class UserController extends Controller
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

    public function show()
    {
        $data = [];

        $user = User::findOrFail(Auth::user()->id);

        $data["title"] = "My Account";
        $data["user"] = $user;

        return view('user.show')->with("data", $data);
    }

    public function edit()
    {
        $data = [];

        $user = User::findOrFail(Auth::user()->id);

        $data["title"] = "My Account";
        $data["user"] = $user;

        return view('user.edit')->with("data", $data);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        $request->validate(User::updateRules($user->id));

        if (empty($request->input('password-current')) && empty($request->input('password')))
        {   
            if ($request->hasFile('image'))
            {
                $storeInterface = app(ImageStorage::class);
                $name = $storeInterface->store_user_image($request);

                $user->update([
                    'name' => $request->name,
                    'last_name' => $request->last_name,
                    'cell_phone' => $request->cell_phone,
                    'email' => $request->email, 
                    'image' => $name
                ]);
            }
            else
            {
                $user->update([
                    'name' => $request->name,
                    'last_name' => $request->last_name,
                    'cell_phone' => $request->cell_phone,
                    'email' => $request->email, 
                ]);
            }
        }
        else
        {   
            if ($request->hasFile('image'))
            {
                $storeInterface = app(ImageStorage::class);
                $name = $storeInterface->store_user_image($request);

                $user->update([
                    'name' => $request->name,
                    'last_name' => $request->last_name,
                    'cell_phone' => $request->cell_phone,
                    'email' => $request->email, 
                    'password' => Hash::make($request->password),
                    'image' => $name,
                ]);    
            } 
            else 
            {
                $user->update([
                    'name' => $request->name,
                    'last_name' => $request->last_name,
                    'cell_phone' => $request->cell_phone,
                    'email' => $request->email, 
                    'password' => Hash::make($request->password),
                ]);    
            }
            
        }

        $message = Lang::get('messages.userEditSuccess');

        return redirect()->route('user.show')->with("success", $message);      
    }
}

?>
