<?php

namespace Database\Seeders;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'id' => uniqid(),
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('adminadmin'),
            'role' => 'admin',
        ]);
        
        User::create([
            'id' => uniqid(),
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => bcrypt('useruser'),
            'role' => 'user',
        ]);

        User::create([
            'id' => uniqid(),
            'name' => 'manager',
            'email' => 'manager@example.com',
            'password' => bcrypt('managermanager'),
            'role' => 'manager',
        ]);

        User::create([
            'id' => uniqid(),
            'name' => 'kurir',
            'email' => 'kurir@example.com',
            'password' => bcrypt('kurirkurir'),
            'role' => 'kurir',
        ]);

        $this->call([
            RequestJemputSeeder::class,
            ProductSeeder::class,
            CouponSeeder::class,
        ]);
    
    }
}
