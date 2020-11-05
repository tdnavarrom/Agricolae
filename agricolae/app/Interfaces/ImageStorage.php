<?php 

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ImageStorage 
{
    public function store_product_image(Request $request);

    public function store_user_image(Request $request);
}

?>