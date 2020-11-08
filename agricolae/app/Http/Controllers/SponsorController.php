<?php

//Author: Tomas Navarro

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SponsorController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
        $ads = Http::get('http://babalao.com.co/api/products')->json();

        $data = [];
        $data['title'] = 'Sponsors';
        $data['sponsors'] = $ads['collection-data'];
        $data['sponsors']['products'] = [];

        for($i = 0; $i < count($ads['data']); $i++ ){
            if($ads['data'][$i]['price'] >= 500){
                array_push($data['sponsors']['products'],$ads['data'][$i]);
            }
        }
        //dd($data['products']);

        return view('sponsor.index')->with("data", $data);
        
    }
}

?>