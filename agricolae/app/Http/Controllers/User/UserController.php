<?php

//Author: Santiago Pulgarin

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show()
    {
        if (Auth::user())
        {
        
            $user = User::findOrFail(Auth::user()->id);

            return view('user.show')->with(['user' => $user]);

        }
        else 
        {
            return redirect()->back();
        }

    }

    public function edit()
    {
        if (Auth::user())
        {

            $user = User::findOrFail(Auth::user()->id);

            return view('user.edit')->with(['user' => $user]);

        }
        else
        {
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        if (Auth::user())
        {   

            $validate = $request->validate(User::updateRules($user->id));

            if ($validate) 
            {

                if (empty($request->input('password-current')) and empty($request->input('password')))
                {
                    
                    $user->update($request->except('password'));

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
                
                return redirect()->route('user.show');

            }
            
        }
    }
}

?>
