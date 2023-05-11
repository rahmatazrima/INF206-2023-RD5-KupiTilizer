<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\Keranjang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;

class PembelianController extends Controller
{
    public function index(){
        return view('adminpembelian');
    }

    public function beli(Request $request){
        $date = Carbon::now();
        // dd($request);
        $keranjang = DB::table('keranjangs')->join('products', 'keranjangs.product_id', '=', 'products.id')->where('user_id', Auth::user()->id)->get();
        $totalBelanja = 0;
        foreach($keranjang as $item){
            $totalBelanja+= ($item->jumlah * $item->harga);
        }

        Pembelian::create([
            'id' => (string)$date->format('ymd').bin2hex(random_bytes(5)),
            'user_id' => Auth::user()->id,
            'total_belanja'=> $totalBelanja,
        ]);

        Keranjang::where('user_id', Auth::user()->id)->delete();

        return redirect()->back()->with('success', 'Barang berhasil di pesan');
    }
}
