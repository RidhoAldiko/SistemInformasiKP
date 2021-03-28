<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index(){
        return view('operator.dashboard');
    }

    public function data_mahasiswa(){
        $results = DB::table('users')
                ->join('mahasiswa','users.email','=','mahasiswa.email_mhs')
                ->join('konsentrasi','konsentrasi.id_konsentrasi','=','mahasiswa.id_konsentrasi')
                ->select('mahasiswa.*','email_verified_at','flag','nama_konsentrasi')
                ->orderBy('npm','asc')
                ->get();
        
        return view('operator.mahasiswa.mahasiswa', compact('results'));
    }

    public function edit_mahasiswa($id)
    {
        $result = Mahasiswa::findOrFail($id);
        return view('operator.mahasiswa.mahasiswa_edit',compact('result'));
    }

    public function update_mahasiswa(Request $request, $email)
    {
        $this->validate($request,[
            'flag' => 'required'
            ]);
        $data = $request->all();
        $data['flag']=(int)$request->get('flag');//merubah tipe data selectbox
        // $user = User::where('email',$email);
        DB::table('users')
            ->where('email','=',$email)
            ->update(['flag' => $data['flag']]);
        return redirect()->route('data-mahasiswa')->with('status',"Data Berhasil Diperbarui");
    }
}
