<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Proposal;
use App\Models\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // tangkap email  dari yang login
        $email =Auth::user()->email;
        // bandingkan dengan data yang ada di tabel mhs
        $cek = Mahasiswa::where('email_mhs', '=', $email)->get('npm');
        // menampilkan seluruh data proposal
        $items = Proposal::where('npm','=', $cek[0]->npm)
                        ->orderBy('id_proposal','desc')->get();
        // cek status proposal
        $proposal = Proposal::where('npm','=',$cek[0]->npm)
                            ->orderBy('id_proposal','desc')
                            ->limit(1)
                            ->select('status')
                            ->get();
        // dd($proposal);
        // cek apakah sudah upload sk kp
        $berkas = Berkas::where('npm','=',$cek[0]->npm)
                        ->where('jenis_berkas','=','sk kp')->get();
        $ending = [];
        if (isset($items)) {
            // ambil array terakhir dari data items proosal
            $last = end($items);
            // ambil array terakhir dari data array last
            $ending =end($last);
        }

        // dd($berkas);
        return view('mahasiswa.proposal.proposal',compact(['items','berkas','ending','proposal']));
        // dd($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $results = Dosen::all();
        return view('mahasiswa.proposal.proposal_add',compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul' => ['required','string'],//,'unique:proposal'
            'nm_instansi' => ['required','string'],
            'alamat_instansi' => ['required','string'],
            'rekomendasi' => ['string'],
            'bimbing_instansi' => ['required','string'],
            'file_proposal' => ['required', 'file','mimes:pdf','max:512'],
            'waktu_kp' => ['required','string'],
        ]);

        $data = $request->all();
        $admin = User::where('level','=',0)->get('email');
        $email =Auth::user()->email;
        // cek judul kp di tabel berkas, jangan sampai ada judul yang sama
        $cekJudul = Berkas::where('jenis_berkas','=','sk kp')->where('nm_berkas','=',$data['judul'])->get();
        if (count($cekJudul) > 0) {
            // jika ada judul yang sama, maka kasih pesan error
            return redirect()->route('proposal.index')->with('error','Judul KP telah digunakan, silahkan tentukan judul baru');
        }else{
            // jika belum ada yang sama, simpan
            $cek = Mahasiswa::where('email_mhs','=',$email)->get();
            if ($cek) {
                //0=mendaftar 1 = verifikasi, 2=tolak, 3=terima, 4=revisi, 5=terima dengan revisi, 6=perbaikan
                // yang boleh mendaftar proposal hanya yang belum pernah upload dan yang proposalnya ditolak
                // jika status proposal adalah 0(mendaftar) atau 1(diterima) ada didatabse maka akan menghasilkan nilai true
                // parameter grouping
                $status =Proposal::where('npm', '=', $cek[0]->npm)
                                ->where(function ($query) {
                                    $query->where('status', '=', 0)
                                        ->orWhere('status', '=', 1)
                                        ->orWhere('status', '=', 3)
                                        ->orWhere('status', '=', 5)
                                        ->orWhere('status', '=', 6);
                                })
                                ->get();
                // jika nilai false(0) maka data akan tersimpan sedangkan jika true(1) maka data tidak akan tersimpan
                if (count($status) == 0) {
                    // dd($cek[0]->npm);sss
                    $proposal =Proposal::where('npm', '=', $cek[0]->npm)
                                        ->where(function ($query){
                                            $query->where('status', '=', 2)
                                                ->orWhere('status', '=', 4);
                                        })
                                        ->orderBy('id_proposal','desc')
                                        ->get();
                    // dd($proposal);
                    $data['npm'] = $cek[0]->npm;
                    $data['judul'] = ucwords(strtolower($data['judul']));
                    $data['nm_instansi'] = ucwords(strtolower($data['nm_instansi']));
                    $data['alamat_instansi'] = ucwords(strtolower($data['alamat_instansi']));
                    $data['bimbing_instansi'] = ucwords(strtolower($data['bimbing_instansi']));
                    $data['waktu_kp'] = ucwords(strtolower($data['waktu_kp']));

                    // jika proposal sebelumnya memiliki status 2(tolak), maka input data baru dengan status 0(daftar)
                    if (count($proposal) == 0 || $proposal[0]->status == 2) {
                        $data['status'] = 0;//mendaftar
                        $data['file_proposal'] = $request->file('file_proposal')->store(
                            'assets/proposal','public'
                        );
                        $pro=Proposal::create($data);

                        if ($pro)  {
                            // Mail::to($admin[0]->email)->send(new PengajuanProposal($email));
                            return redirect()->route('proposal.index')->with('status','Proposal Berhasil Diajukan');
                        }//end if $pro
                    } elseif ($proposal[0]->status == 4) {
                        // jika proposal sebelumnya memiliki status 4(revisi), maka input data baru dengan status 6(perbaikan)
                        $data['status'] = 6;//mendaftar
                        $data['nid'] = $proposal[0]->nid;
                        // $data['instansi_id']=(int)$request->get('instansi_id');//merubah tipe data selectbox
                        $data['file_proposal'] = $request->file('file_proposal')->store(
                            'assets/proposal','public'
                        );
                        $pro=Proposal::create($data);

                        if ($pro)  {
                            $email_dosen = Dosen::where('nid','=',$proposal[0]->nid)->get();
                            // Mail::to($email_dosen[0]->email_dosen)->send(new PerbaikanProposal($email));
                            return redirect()->route('proposal.index')->with('status','Proposal Berhasil Diajukan');
                        }//end if $pro
                    }
                }//end if $status
                else{
                    return redirect()->route('proposal.index')->with('error','Proposal Gagal Diajukan');
                }
                // dd($status);
            }//end if cek
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Proposal::findOrFail($id);
        $center = '';
        if ($data->status > 0) {
            $center = 'justify-content-center';
        }
        return view('mahasiswa.proposal.proposal_show',compact(['data','center']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Proposal::findOrFail($id);
        $dosen = Dosen::all();
        return view('mahasiswa.proposal.proposal_edit',compact(['data','dosen']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'judul' => ['string'],//,'unique:proposal,judul,'.$id.',id_proposal'
            'nm_instansi' => ['required','string'],
            'alamat_instansi' => ['required','string'],
            'rekomendasi' => ['string'],
            'bimbing_instansi' => ['string'],
            'file_proposal' => ['file','mimes:pdf','max:512'],
            'waktu_kp' => ['string'],
        ]);

        $data = $request->all();
        $proposal = Proposal::findOrFail($id);
        $cekJudul = Berkas::where('jenis_berkas','=','sk kp')->where('nm_berkas','=',$data['judul'])->get();
        if (count($cekJudul) > 0) {
            return back()->withInput()->with('error','Judul KP telah digunakan, silahkan tentukan judul baru');
        }else{
            // jika user ada ganti proposal jalan kan ini
            if ($request->hasFile('file_proposal')) {
                // jika proposal ada
                if ($proposal->file_proposal) {
                    // hapus file_proposal di folder public
                    Storage::delete('public/'.$proposal->file_proposal);
                }
                // simpan foto yang diupload ke folder assets/honorer yang ada di public lalu simpan dalam variable data[foto]
                $data['file_proposal'] = $request->file('file_proposal')->store(
                    'assets/proposal','public'
                );
            }//end if hasFile(foto)
            $data['judul'] = ucwords(strtolower($data['judul']));
            $data['nm_instansi'] = ucwords(strtolower($data['nm_instansi']));
            $data['bimbing_instansi'] = ucwords(strtolower($data['bimbing_instansi']));
            $proposal->update($data);
            return redirect()->route('proposal.index')->with('status','Proposal Berhasil Diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
