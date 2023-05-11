<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestJemputRequest;
use App\Http\Requests\UpdateRequestJemputRequest;
use App\Models\RequestJemput;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RequestJemputController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data = DB::table('request_jemputs')->get(['id', 'name', 'status']);
        // dd($data);
        return view('adminpenjemputan', ['dataRequest' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request){
        $date = Carbon::now();
        // dd(Auth::user()->name);
        // dd($date->format('Ymd').Auth::user()->id.$date->format('his'));
        Requestjemput::create([
            'id' => (string)$date->format('ymd').bin2hex(random_bytes(5)),
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'no_hp' => $request->hp,
            'alamat' => $request->alamat,
            'jenis_sampah' => $request->jenisSampah,
            'total_sampah' => $request->totalSampah,
            'tanggal_jemput' => $request->tanggalJemput,
            'waktu_jemput' => $request->waktuJemput,
        ]);

        return redirect()->back();
    }

    /**
     * 
     */
    public function detail($id)
    {
        $data = DB::table('request_jemputs')->where('id', $id)->get();

        return view('detailRequestPenjemputan', ['data' => $data[0]]);
    }

    /**
     * 
     */
    public function acceptRequest($id)
    {
        DB::table('request_jemputs')->where('id', $id)->update([
            'status' => 'accepted'
        ]);
        return redirect()->back();
    }

    /**
     * 
     */
    public function doneRequest($id)
    {
        DB::table('request_jemputs')->where('id', $id)->update([
            'status' => 'done'
        ]);
        return redirect()->back();
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestJemputRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestJemput $requestJemput)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestJemput $requestJemput)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestJemputRequest $request, RequestJemput $requestJemput)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestJemput $requestJemput)
    {
        //
    }
}
