<?php

//Author: Carlos Mesa

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.index');
    }

    public function about_us()
    {
        return view('about.index');
    }

    public function contact_us()
    {
        return view('contact.index');
    }
}

?>