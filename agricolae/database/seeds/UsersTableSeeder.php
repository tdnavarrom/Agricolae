<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'last_name' => 'Farmer',
            'cell_phone' => '3005529391',
            'email' => 'admin-farmer@example.com',
            'email_verified_at' => now(),
            'user_type' => 'farmer',
            'password' => bcrypt("Admin12345*"), // password
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Admin2',
            'last_name' => 'Farmer2',
            'cell_phone' => '3005529392',
            'email' => 'admin-farmer2@example.com',
            'email_verified_at' => now(),
            'user_type' => 'farmer',
            'password' => bcrypt("Admin12345*"), // password
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Admin3',
            'last_name' => 'Farmer3',
            'cell_phone' => '3005529393',
            'email' => 'admin-farmer3@example.com',
            'email_verified_at' => now(),
            'user_type' => 'farmer',
            'password' => bcrypt("Admin12345*"), // password
            'remember_token' => Str::random(10),
        ]);

        factory(User::class,80)->create();
    }
}
