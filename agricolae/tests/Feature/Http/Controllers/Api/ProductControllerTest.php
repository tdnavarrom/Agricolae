<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_store()
    {
        //$this->withoutExceptionHandling();
        $response = $this->json('POST', 'api/products', [
            'name' => 'Producto de Prueba',
            'description' => 'Descripcion de Prueba Para que funcione y no me tire problemas, voy a escribir un poquito mas',
            'category' => 'fruits',
            'price' => '30000',
            'units' => 'unit',
            'image' => '1601987684462773.jpg',//Storage::get(public_path('images/products_images/1601987684462773.jpg')), HASTA QUE FUNCIONE ESTA VUELTA YO NO TOCO NI VERGA
        ]);

        $response->assertJsonStructure(['id', 'name', 'description','category','price','units', 'image', 'created_at', 'updated_at'])
            ->assertJson([
                'name' => 'Producto de Prueba',
                'description' => 'Descripcion de Prueba Para que funcione y no me tire problemas, voy a escribir un poquito mas',
                'category' => 'fruits',
                'price' => '30000',
                'units' => 'unit',
                'image' => '',//base64_encode(File::get('public/images/products_images/1601987684462773.jpg')),
            ])
            ->assertStatus(201);

        $this->assertDatabaseHas('products', [
            'name' => 'Producto de Prueba',
            'description' => 'Descripcion de Prueba Para que funcione y no me tire problemas, voy a escribir un poquito mas',
            'category' => 'fruits',
            'price' => '30000',
            'units' => 'unit',
            'image' => '',
        ]);
    }

    public function test_show()
    {
        //$this->withoutExceptionHandling();
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

    public function test_update()
    {

        $this->withoutExceptionHandling();
        $product = factory(Product::class)->create();

        $response = $this->json('PUT', "/api/products/$product->id", [
            'name' => 'Producto de Prueba',
            'description' => 'Descripcion de Prueba Para que funcione y no me tire problemas, voy a escribir un poquito mas',
            'category' => 'fruits',
            'price' => '30000',
            'units' => 'unit',
            'image' => '1601987684462773.jpg',//Storage::get(public_path('images/products_images/1601987684462773.jpg')), HASTA QUE FUNCIONE ESTA VUELTA YO NO TOCO NI VERGA
        ]);

        $response->assertJsonStructure(['id', 'name', 'description','category','price','units', 'image', 'created_at', 'updated_at'])
            ->assertJson([
                'name' => 'Producto de Prueba',
                'description' => 'Descripcion de Prueba Para que funcione y no me tire problemas, voy a escribir un poquito mas',
                'category' => 'fruits',
                'price' => '30000',
                'units' => 'unit',
                'image' => '1601987684462773.jpg',//base64_encode(File::get('public/images/products_images/1601987684462773.jpg')),
            ])
            ->assertStatus(200);

        $this->assertDatabaseHas('products', [
            'name' => 'Producto de Prueba',
            'description' => 'Descripcion de Prueba Para que funcione y no me tire problemas, voy a escribir un poquito mas',
            'category' => 'fruits',
            'price' => '30000',
            'units' => 'unit',
            'image' => '1601987684462773.jpg',
        ]);
    }

    public function test_delete()
    {

        $this->withoutExceptionHandling();
        $product = factory(Product::class)->create();

        $response = $this->json('DELETE', "/api/products/$product->id");

        $response->assertSee(null)
            ->assertStatus(204);

        $this->assertDatabaseMissing('products', [
            'id' => $product->id
        ]);
    }

    public function test_index()
    {

        $this->withoutExceptionHandling();
        $product = factory(Product::class, 5)->create();

        $response = $this->json('GET', '/api/products');

        $response->assertJsonStructure([
            'data' => [
                '*' => ['id', 'user_id', 'name', 'description', 'category', 'price','units', 'image']
            ]
        ])->assertStatus(200);
    }

}
