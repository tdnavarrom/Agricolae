<?php

//Author: Santiago Pulgarin

namespace App\Http\Controllers;

class LanguageController extends Controller
{

    public function setLanguage($lang) 
    {

        session(['lang' => $lang]);

        return back();

    }

}

?>