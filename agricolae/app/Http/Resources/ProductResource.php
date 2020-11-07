<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource

{

    public function toArray($request)

    {

        return [

            'id' => $this->getId(),
            'user_id' => $this->getUserId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'category' => $this->getCategory(),
            'price' => $this->getPrice(),
            'units' => $this->getUnits(),
            'rating' => $this->getRating(),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
            'image' => 'http://www.agricolae.tk/public/storage/product_images/' . $this->getImage(),
            'product_link' => 'http://www.agricolae.tk/public/product/show/' . $this->getId(),

        ];
    }
}
