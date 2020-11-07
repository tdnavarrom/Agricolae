<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductResource;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    public function bestRating()
    {
        return ProductResource::collection(Product::orderBy('rating', 'DESC')->get());
    }


    public function worstRating()
    {
        return ProductResource::collection(Product::orderBy('rating', 'ASC')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ProductResource::collection(Product::findOrFail($id));
    }
}
