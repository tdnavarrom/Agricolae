<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage 
{

    public function store_product_image($request)
    {
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            Storage::disk('product_images')->put($name,file_get_contents($request->file('image')->getRealPath()));
            return $name;
        }
    }

    public function store_user_image($request)
    {
        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $name = time().$file->getClientOriginalName();
            Storage::disk('user_images')->put($name,file_get_contents($request->file('image')->getRealPath()));
            return $name;
        }
    }

}

?>