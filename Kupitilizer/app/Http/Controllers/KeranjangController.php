<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKeranjangRequest;
use App\Http\Requests\UpdateKeranjangRequest;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
        $keranjang = DB::table('keranjangs')->join('products', 'keranjangs.product_id', '=', 'products.id')->where('user_id', Auth::user()->id)->get();
        $totalBelanja = 0;
        foreach($keranjang as $item){
            $totalBelanja+= ($item->jumlah * $item->harga);
        }
        // dd($totalBelanja);
        return view('keranjang', ['keranjang' => $keranjang, 'totalBelanja' => $totalBelanja]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKeranjangRequest $request)
    {
        //dd($request);
        Keranjang::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan
        ]);

        return redirect()->back()->with('success', 'Barang berhasil ditambahkan kedalam keranjang');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKeranjangRequest $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);

        Keranjang::where([
            ['user_id', '=', Auth::user()->id],
            ['product_id', '=', $id]
            ])->delete();

        return redirect()->back();
    }
}
