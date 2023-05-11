<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Coupon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupon::create([
            'id'=>'1234',
            'nama_coupon' => 'Kupon 1',
            'poin' => 100,
            'deskripsi' => 'Ini Kupon 1',
        ]);
        Coupon::create([
            'id'=>'1235',
            'nama_coupon' => 'Kupon 2',
            'poin' => 125,
            'deskripsi' => 'Ini Kupon 2',
        ]);
        Coupon::create([
            'id'=>'1236',
            'nama_coupon' => 'Kupon 3',
            'poin' => 150,
            'deskripsi' => 'Ini Kupon 3',
        ]);
    }
}
