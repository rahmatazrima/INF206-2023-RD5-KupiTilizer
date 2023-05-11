<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nama_coupon',
        'poin',
        'deskripsi',
        //'masa_berlaku', 
        //'gambar_coupon'   
    ];

    // public function waktuCountdown()
    // {
    //     $now = Carbon::now();
    //     $akhir = Carbon::parse($this->masa_berlaku);
    //     return $akhir->diff($now)->format('%H:%I:%S');
    // }

}
