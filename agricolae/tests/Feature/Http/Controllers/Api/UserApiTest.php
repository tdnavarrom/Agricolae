<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;


use Tests\TestCase;

class UserApiTest extends TestCase
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
        $user = User::create([
            'name' => 'Admin',
            'last_name' => 'Farmer',
            'cell_phone' => '3005529391',
            'email' => 'admin-farmer@example.com',
            'email_verified_at' => now(),
            'user_type' => 'farmer',
            'password' => bcrypt("Admin12345*"), // password
            'remember_token' => Str::random(10),
        ]);

        $response = $this->json('GET', "/api/users/$user->id");

        $response->assertJsonStructure(['id', 'name', 'last_name', 'cell_phone', 'email', 'user_type', 'password', 'image', 'created_at', 'updated_at'])
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
