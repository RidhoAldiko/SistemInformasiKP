<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\User;
use App\Models\Berkas;
use App\Models\Proposal;
use App\Mail\PembimbingMahasiswa;
use App\Mail\DosenPembimbing;
use App\Mail\PengajuanProposalDitolak;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all()->count();
        $dosen = Dosen::all()->count();
        $berkas = Berkas::where('jenis_berkas', '=', 'Laporan Seminar')->count();
        return view('operator.dashboard', compact('mahasiswa', 'dosen', 'berkas'));
    }
    //Menu Data Mahasiswa
    public function data_mahasiswa()
    {
        $results = DB::table('users')
            ->join('mahasiswa', 'users.email', '=', 'mahasiswa.email_mhs')
            ->join('konsentrasi', 'konsentrasi.id_konsentrasi', '=', 'mahasiswa.id_konsentrasi')
            ->select('mahasiswa.*', 'email_verified_at', 'flag', 'nama_konsentrasi')
            ->orderBy('npm', 'asc')
            ->get();

        return view('operator.mahasiswa.mahasiswa', compact('results'));
    }

    public function edit_mahasiswa($id)
    {
        $result = Mahasiswa::findOrFail($id);
        return view('operator.mahasiswa.mahasiswa_edit', compact('result'));
    }

    public function update_mahasiswa(Request $request, $email)
    {
        $this->validate($request, [
            'flag' => 'required'
        ]);
        $data = $request->all();
        $data['flag'] = (int)$request->get('flag'); //merubah tipe data selectbox
        // $user = User::where('email',$email);
        DB::table('users')
            ->where('email', '=', $email)
            ->update(['flag' => $data['flag']]);
        return redirect()->route('data-mahasiswa')->with('status', "Data Berhasil Diperbarui");
    }

    //menu data Proposal
    public function proposal()
    {
        $items = Proposal::join('mahasiswa', 'proposal.npm', '=', 'mahasiswa.npm')
            // ->where('status','=',0)
            // ->orderBy('proposal.npm','Desc')
            ->select('proposal.*', 'nm_mhs')
            ->get();
        $no = 1;

        return view('operator.proposal.proposal', compact(['items', 'no']));
    }

    public function riwayat_proposal()
    {
        $items = Proposal::join('mahasiswa', 'proposal.npm', '=', 'mahasiswa.npm')
            ->where('status', '>', 0)
            ->orderBy('id_proposal', 'desc')
            ->select('proposal.*', 'nm_mhs', 'email_mhs', 'id_konsentrasi', 'nohp', 'foto')
            ->get();
        // dd($items);
        return view('operator.proposal.proposal_riwayat', compact('items',));
    }

    public function beri_pembimbing($id)
    {
        $id = $id; //id proposal
        $dosen = Dosen::addSelect([
            'email_dosen' => User::select('email')
                ->whereNotNull('email_verified_at')
                ->where('flag', '=', 0)
                ->whereColumn('email', 'dosen.email_dosen')
        ])
            ->get();

        return view('operator.proposal.beriPembimbing', compact(['dosen', 'id']));
    }

    public function store_pembimbing(Request $request, $id)
    {
        $this->validate($request, [
            'nid' => 'required', 'string'
        ]);

        $data = $request->all();
        $item = Proposal::findOrFail($id);
        $data['status'] = 1; //verifikasi
        $email = DB::table('dosen')->where('nid', '=', $data['nid'])->get();
        $email_mhs = DB::table('mahasiswa')->where('npm', '=', $item['npm'])->get();

        // dd($email_mhs);
        if (count($email) > 0) {
            $item->update($data);
            if ($item) {
                // jika dosen pembimbing telah ditentukan, beri notif kedosen dan kirim data proosal melalui email
                Mail::to($email[0]->email_dosen)->send(new PembimbingMahasiswa($item->id_proposal));
                // jika dosen pembimbing telah ditentukan, beri notif ke mahasiswa dan kirim data proosal melalui email
                Mail::to($email_mhs[0]->email_mhs)->send(new DosenPembimbing($email));
            }
            return redirect()->route('proposal')->with('status', "Proposal Telah Diperiksa");
        }
        return back()->withInput()->with('error', "Tentukan Dosen Pembimbing");
    }

    public function tolak_proposal($id)
    {
        $item = Proposal::findOrFail($id);
        $status['status'] = 2; //Ditolak
        $npm = $item['npm'];
        $email = DB::table('mahasiswa')
            ->where('npm', '=', $npm)
            ->get();
        // dd($email[0]->email_mhs);
        $item->update($status);
        if ($item) {
            // hapus proposal di folder public
            // Storage::delete('public/'.$item->file_proposal);
            // $status['file_proposal'] = '';
            $item->update($status);
            Mail::to($email[0]->email_mhs)->send(new PengajuanProposalDitolak($item));
            // kirim email ke mahasiswa yang bersangkutan lalu kirim data proposal yang ditolak
        }
        return redirect()->route('proposal')->with('status', "Proposal Telah Diperiksa");
    }

    public function profile()
    {
        $email = Auth::user()->email;
        // cari nid dosen dari email yang didapat di tabel dosen
        $op = DB::table('users')
            ->where('email', '=', $email)
            ->where('level', '=', 0)
            ->get();
        // dd($op);
        return view('operator.profile', compact('op'));
    }

    public function profile_update(Request $request, $id)
    {
        $this->validate($request, [
            'email' => ['string', 'email', 'max:255', 'unique:users,email,' . $id . ',id']
        ]);
        $data = $request->all();
        $item = User::findOrFail($id);
        $item->update($data);
        return redirect()->route('operator')->with('status', "Data Berhasil Diperbarui");
    }

    public function password()
    {
        $email = Auth::user()->email;
        $item = DB::table('users')->where('email', '=', $email)->get();
        return view('operator.password', compact('item'));
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
            return redirect()->route('operator')->with('status', "Data Berhasil Diperbarui");
        } else {
            return redirect()->route('operator.password')->with('error', 'Password Lama Tidak Sesuai');
        }
    }
}
