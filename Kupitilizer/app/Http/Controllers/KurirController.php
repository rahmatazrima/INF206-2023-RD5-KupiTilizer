<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class KurirController extends Controller
{
    public function dashboard(){
        return view('dashboardKurir');
    }

    public function manageKurir(){
        $kurir = DB::table('users')->where('role', 'kurir')->get();
        return view('manageKurir', ['kurir' => $kurir]);
    }

    public function requestJemput(){
        $data = DB::table('request_jemputs')->get(['id', 'name', 'status']);
        // dd($data);
        return view('kurirpenjemputan', ['dataRequest' => $data]);
    }

    public function detail($id)
    {
        $data = DB::table('request_jemputs')->where('id', $id)->get();

        return view('detailRequestPenjemputanKurir', ['data' => $data[0]]);
    }

        /**
     * 
     */
    public function acceptRequest($id)
    {
        DB::table('request_jemputs')->where('id', $id)->update([
            'status' => 'process',
            'kurir_id' => Auth::user()->id
        ]);
        return redirect()->back();
    }

    /**
     * 
     */
    public function declineRequest($id)
    {
        DB::table('request_jemputs')->where('id', $id)->update([
            'status' => 'decline'
        ]);
        return redirect()->back();
    }

        /**
     * 
     */
    public function cancelRequest($id)
    {
        DB::table('request_jemputs')->where('id', $id)->update([
            'status' => 'waiting'
        ]);
        return redirect()->back();
    }

    /**
     * 
     * Menambahkan akun user
     * @param Request $request
     * @return redirect('manager/manageuser')->with('success', 'User berhasil ditambahkan')
     * 
     */
    public function add(Request $request): RedirectResponse
    {
        //melakukan validasi inputan
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        //melakukan create user
        $user = User::create([
            'id' => uniqid(),
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'kurir',
            'password' => Hash::make($request->password),
        ]);

        ///kembali ke laman manage user dengan alert succes
        return redirect()->back()->with('success', 'User berhasil ditambahkan');
    }
    
    /**
     * 
     * Menghapus akun user
     * @param $email
     * @return redirect('manager/manageuser')->with('success', 'User berhasil dihapus')
     * 
     */
    public function destroy($email): RedirectResponse
    {

        //menghapus akun dari database dimana email sesuai dengan parameter
        DB::table('users')->where('email', $email)->delete();
        
        ///kembali ke laman manage user dengan alert succes
        return redirect()->back()->with('success', 'User berhasil dihapus');
    }

    /**
     * 
     * Menampilkan kembali data user pada form edit
     * @param $email
     * @return return view('edituser',['user'=>$user])
     * 
     */
    public function show($email)
    {   

        //mengambil data dari database dimana emailnya sesuai dengan parameter
        $user=DB::table('users')->where('email', $email)->get();

        //return ke edituser untuk menampilkan laman edit data
        return view('editkurir',['user'=>$user]);
    }

    /**
     * 
     * Mengupdate data akun user
     * @param Request $request, $email
     * @return redirect('manager/manageuser')->with('success', 'User berhasil ditambahkan');
     * 
     */
    public function update(Request $request, $email): RedirectResponse
    {   

        //aturan untuk inputan data
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        //rules untuk email jika diganti
        if($request->email != $email){
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:'.User::class];
        }
        
        //validasi inputan dengan rules
        $request->validate($rules);

        //melakukan update data
        DB::table('users')->where('email', $email)
            ->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            ]);        

        if(Auth::user()->role == "manager"){
            return redirect('manager/managekurir')->with('success', 'Data kurir berhasil diedit!');
        }else{
            return redirect('admin/managekurir')->with('success', 'Data kurir berhasil diedit!');
        }
    }
}
