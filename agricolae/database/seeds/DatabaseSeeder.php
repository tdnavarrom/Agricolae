<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Tomas',
            'last_name' => 'Navarro',
            'cell_phone' => '3005529391',
            'email' => 'tomas-navarro@hotmail.com',
            'user_type' => 'farmer',
            'password' => bcrypt("TomasDavid2001"), // password
            'remember_token' => Str::random(10),
        ]);

        factory(App\User::class, 20)->create();
        factory(App\Product::class, 60)->create();
        factory(App\Review::class, 120)->create();
    }
}
