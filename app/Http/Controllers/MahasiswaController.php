<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Konsentrasi;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.dashboard');
    }

    public function profile()
    {
        $email = Auth::user()->email;
        $item = DB::table('mahasiswa')
            ->join('konsentrasi', 'mahasiswa.id_konsentrasi', '=', 'konsentrasi.id_konsentrasi')
            ->where('email_mhs', '=', $email)
            ->select('mahasiswa.*', 'konsentrasi.*')
            ->get();
        $konsentrasi = Konsentrasi::all();
        // dd($item);
        return view('mahasiswa.profile', compact(['item', 'konsentrasi']));
    }

    public function profile_update(Request $request, $npm)
    {
        $this->validate($request, [
            'email_mhs' => ['required', 'string', 'email', 'max:255', 'unique:mahasiswa,email_mhs,' . $npm . ',npm'],
            'nm_mhs' => ['string', 'required'],
            'nohp' => ['string', 'max:15', 'required'],
            'konsentrasi' => ['string']
        ]);
        $data = $request->all();
        $data['nm_mhs'] = ucwords(strtolower($data['nm_mhs']));
        $data['id_konsentrasi'] = (int)$request->get('konsentrasi'); //merubah tipe data selectbox dari string ke int
        // $data['konsentrasi'] = ucwords(strtolower($data['konsentrasi']));
        $email = Auth::user()->email;
        $item = Mahasiswa::findOrFail($npm);
        $nilai = explode("@", $data['email_mhs']);
        if ($nilai[1] == "student.uir.ac.id") {
            $item->update($data);
            $user = User::where('email', '=', $email)
                ->update([
                    'email' => $data['email_mhs'],
                    // 'password' => Hash::make($data['password']),
                ]);
            return redirect()->route('mahasiswa')->with('status', "Data Berhasil Diperbarui");
        } else {
            return redirect()->route('mahasiswa')->with('error', "Data Gagal Diperbarui");
        }
    }

    public function password()
    {
        $email = Auth::user()->email;
        $item = DB::table('users')->where('email', '=', $email)->get();
        return view('mahasiswa.password', compact('item'));
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
            return redirect()->route('mahasiswa')->with('status', "Data Berhasil Diperbarui");
        } else {
            return redirect()->route('mahasiswa.password')->with('error', 'Password Lama Tidak Sesuai');
        }
    }

    public function edit_foto()
    {
        $email = Auth::user()->email;
        $item = DB::table('mahasiswa')->where('email_mhs', '=', $email)->get();
        return view('mahasiswa.edit-foto', compact('item'));
    }

    public function update_foto(Request $request, $npm)
    {
        $this->validate($request, [
            'foto' => ['file', 'mimes:jpg,jpeg,png', 'max:200'],
        ]);
        $data = $request->all();
        $item = Mahasiswa::findOrFail($npm);

        // dd($data);
        if ($request->hasFile('foto')) {
            // jika fotonya ada
            if ($item->foto) {
                // hapus foto di folder public
                Storage::delete('public/' . $item->foto);
            }
            // simpan foto yang diupload ke folder assets/honorer yang ada di public lalu simpan dalam variable data[foto]
            $data['foto'] = $request->file('foto')->store(
                'assets/mahasiswa',
                'public'
            );
        } //end if hasFile(foto)

        $item->update($data);

        return redirect()->route('mahasiswa')->with('status', "Data Berhasil Diperbarui");
    }
}
