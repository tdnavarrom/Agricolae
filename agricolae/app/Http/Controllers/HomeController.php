<?php 

//Author: Santiago Pulgarin

namespace App\Http\Controllers;

class HomeController extends Controller 
{

    public function index() 
    {

        return view('home.index');
        
    }

}

?>