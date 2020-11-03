<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class ProductApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

   

    public function test_show()
    {
        $this->withoutExceptionHandling();
        $product = factory(Product::class)->create();

        $response = $this->json('GET', "/api/products/$product->id");

        $response->assertJsonStructure(['id', 'name', 'description','category','price','units', 'image', 'created_at', 'updated_at'])
            ->assertJson([
                'name' => $product->name,
                'description' => $product->description,
                'category' => $product->category,
                'price' => $product->price,
                'units' => $product->units,
                'image' => $product->image,
            ])
            ->assertStatus(200);
    }

    public function test_index()
    {

        $this->withoutExceptionHandling();
        $product = factory(Product::class, 5)->create();

        $response = $this->json('GET', '/api/products');

        $response->assertJsonStructure([
                '*' => ['id', 'user_id', 'name', 'description', 'category', 'price','units', 'image', 'created_at', 'updated_at']
        ])->assertStatus(200);
    }

}
