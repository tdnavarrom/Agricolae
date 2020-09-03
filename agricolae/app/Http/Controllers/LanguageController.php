<?php

//Author: Santiago Pulgarin

namespace App\Http\Controllers;

class LanguageController
{

    public function setLanguage($lang) 
    {

        session(['lang' => $lang]);

        return back();

    }

}

?>