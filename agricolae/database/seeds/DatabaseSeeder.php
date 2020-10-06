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
            'name' => 'Admin',
            'last_name' => 'Farmer',
            'cell_phone' => '3005529391',
            'email' => 'admin-farmer@example.com',
            'user_type' => 'farmer',
            'password' => bcrypt("Admin12345*"), // password
            'remember_token' => Str::random(10),
        ]);

        App\User::create([
            'name' => 'Admin2',
            'last_name' => 'Farmer2',
            'cell_phone' => '3005529392',
            'email' => 'admin-farmer2@example.com',
            'user_type' => 'farmer',
            'password' => bcrypt("Admin12345*"), // password
            'remember_token' => Str::random(10),
        ]);

        App\User::create([
            'name' => 'Admin3',
            'last_name' => 'Farmer3',
            'cell_phone' => '3005529393',
            'email' => 'admin-farmer3@example.com',
            'user_type' => 'farmer',
            'password' => bcrypt("Admin12345*"), // password
            'remember_token' => Str::random(10),
        ]);

        factory(App\User::class, 20)->create();
        factory(App\Product::class, 60)->create();
        factory(App\Review::class, 500)->create();
    }
}
