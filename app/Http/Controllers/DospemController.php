<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\DosenKerjaPraktek;
use Illuminate\Support\Facades\DB;
// use Yajra\DataTables\DataTables;

class DospemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Dosen::with('user')->get();
        return view('operator.dospem.dospem',compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operator.dospem.dospem_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nid' => ['required','string', 'max:10', 'unique:dosen'],
            'email_dosen' => ['required', 'string', 'max:255', 'unique:dosen'],
            'nm_dosen' => ['required', 'string', 'max:255'],
            'nohp_dosen' => ['required', 'string','max:15'],
            'jabatan' => ['string','nullable'],
            // 'foto' => ['required', 'image','mimes:jpeg,jpg,png','max:1024'],
        ]);
        $data = $request->all();
        $data['email_dosen'] = $request->email_dosen.'@gmail.com';
        $data['nm_dosen'] = ucwords(strtolower($data['nm_dosen']));
        $data['jabatan'] = ucwords(strtolower($data['jabatan']));
        $dosen = Dosen::create($data);
        if ($dosen) {
            $user = User::create([
                'level' => 1,//dosen
                'flag' => 0,//aktif
                'email' => $data['email_dosen'],
                'password' => Hash::make($data['nid']),
            ]);
            // jika user berhasil diinput maka kirim email ke dosen
            if ($user)  {
                Mail::to($data['email_dosen'])->send(new DosenKerjaPraktek());
            }
        }
        return redirect()->route('dospem.index')->with('status','Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nid)
    {
        $results = Dosen::findOrFail($nid);
        return view('operator.dospem.dospem_edit',compact('results'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nid)
    {
        $this->validate($request, [
            // unique:dosen merupakan nama table, email dosen merupakan kondisi yang diinginkan berdasakrak $id yang di peroleh dari request
            // email_dosen terakhir adalah pk dari table tersebut
            'email_dosen' => ['string', 'email', 'max:255', 'unique:dosen,email_dosen,'.$nid.',nid']
        ]);

        $data = $request->all();

        $dosen = Dosen::findOrFail($nid);
        // $user = DB::table('users')->where('email', $dosen->email_dosen)->get();
        $user = User::where('email',$dosen->email_dosen);

        $data['flag']=(int)$request->get('flag');//merubah tipe data selectbox

        $dosen->update($data);
        // jika data dosen berhasil update, maka update data dosen yang ada ditable user
        if ($dosen) {
            $user->update([
                'email' => $data['email_dosen'],
                'flag' => $data['flag'],
            ]);
            // if ($user)  {
            //     Mail::to($data['email_dosen'])->send(new DosenEmail());
            // }
            return redirect()->route('dospem.index')->with('status','Data Berhasil Diubah');
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
