<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Konsentrasi;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    public function index()
    {
        return view('dosen.dashboard');
    }

    public function profile()
    {
        $email = Auth::user()->email;
        $item = DB::table('dosen')->where('email_dosen', '=', $email)->get();
        // dd($item);
        return view('dosen.profile', compact(['item']));
    }

    public function profile_update(Request $request, $nid)
    {
        $this->validate($request, [
            'email_dosen' => ['required', 'string', 'email', 'max:255', 'unique:dosen,email_dosen,' . $nid . ',nid'],
            'nm_dosen' => ['string', 'required'],
            'nohp_dosen' => ['string', 'max:15', 'min:0', 'required'],
            'jabatan' => ['string', 'nullable']
        ]);
        $data = $request->all();
        $data['nm_dosen'] = ucwords(strtolower($data['nm_dosen']));
        $data['jabatan'] = ucwords(strtolower($data['jabatan']));
        $email = Auth::user()->email;
        $item = Dosen::findOrFail($nid);
        $nilai = explode("@", $data['email_dosen']);
        // dd($nilai);
        if ($nilai[1] == "gmail.com") {
            $item->update($data);
            $user = User::where('email', '=', $email)
                ->update([
                    'email' => $data['email_dosen'],
                ]);
            return redirect()->route('dosen')->with('status', "Data Berhasil Diperbarui");
        } else {
            return redirect()->route('dosen')->with('error', "Data Gagal Diperbarui");
        }
    }

    public function password()
    {
        $email = Auth::user()->email;
        $item = DB::table('users')->where('email', '=', $email)->get();
        return view('dosen.password', compact('item'));
    }

    public function password_update(Request $request, $email)
    {
        $this->validate($request, [
            'passLama' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $data = $request->all();
        $item = User::where('email', '=', $email)->get();
        if (password_verify($data['passLama'], $item[0]->password)) {
            $item[0]->update([
                'password' => Hash::make($data['password']),
            ]);
            return redirect()->route('dosen')->with('status', "Data Berhasil Diperbarui");
        } else {
            return redirect()->route('dosen.password')->with('error', 'Password Lama Tidak Sesuai');
        }
    }

    public function edit_foto()
    {
        $email = Auth::user()->email;
        $item = DB::table('dosen')->where('email_dosen', '=', $email)->get();
        return view('dosen.edit-foto', compact('item'));
    }

    public function update_foto(Request $request, $nid)
    {
        $this->validate($request, [
            'foto' => ['file', 'mimes:jpg,jpeg,png', 'max:200'],
        ]);
        $data = $request->all();
        $item = Dosen::findOrFail($nid);

        // dd($data);
        if ($request->hasFile('foto')) {
            // jika fotonya ada
            if ($item->foto) {
                // hapus foto di folder public
                Storage::delete('public/' . $item->foto);
            }
            // simpan foto yang diupload ke folder assets/honorer yang ada di public lalu simpan dalam variable data[foto]
            $data['foto'] = $request->file('foto')->store(
                'assets/dosen',
                'public'
            );
        } //end if hasFile(foto)

        $item->update($data);

        return redirect()->route('dosen')->with('status', "Data Berhasil Diperbarui");
    }
}
