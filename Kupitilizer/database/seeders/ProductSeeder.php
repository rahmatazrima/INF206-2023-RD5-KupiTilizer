<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Product::create([
            'id' => '123456781',
            'nama_product' => 'Product Example 1',
            'harga' => 50000,
            'deskripsi' => 'Etiam consequat sem ullamcorper, euismod metus sit amet, tristique justo. Vestibulum mattis, nisi ut.',
        ]);
          Product::create([
            'id' => '123456782',
            'nama_product' => 'Product Example 2',
            'harga' => 30000,
            'deskripsi' => 'Etiam consequat sem ullamcorper,
            euismod metus sit amet, tristique justo.
            Vestibulum mattis, nisi ut.',
        ]);
        Product::create([
            'id' => '123456783',
            'nama_product' => 'Product Example 3',
            'harga' => 100000,
            'deskripsi' => 'Etiam consequat sem ullamcorper,
            euismod metus sit amet, tristique justo.
            Vestibulum mattis, nisi ut.',
        ]);

        Product::create([
            'id' => '123456784',
            'nama_product' => 'Product Example 4',
            'harga' => 100000,
            'deskripsi' => 'Etiam consequat sem ullamcorper,
            euismod metus sit amet, tristique justo.
            Vestibulum mattis, nisi ut.',
        ]);

        Product::create([
            'id' => '123456785',
            'nama_product' => 'Product Example 5',
            'harga' => 100000,
            'deskripsi' => 'Etiam consequat sem ullamcorper,
            euismod metus sit amet, tristique justo.
            Vestibulum mattis, nisi ut.',
        ]);
    }
}
