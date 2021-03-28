<?php

namespace App\Http\Controllers;
use App\Models\Konsentrasi;
use Illuminate\Http\Request;

class KonsentrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Konsentrasi::all();
        return view('operator.konsentrasi.konsentrasi', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('operator.konsentrasi.konsentrasi_add');
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
            'nama_konsentrasi' => ['string', 'max:70', 'unique:konsentrasi'],
            'status' => 'required',
            ]);
        $data = $request->all();
        $data['nama_konsentrasi'] = ucwords(strtolower($data['nama_konsentrasi']));
        $konsen = Konsentrasi::create($data);
        if ($konsen) {
            return redirect()->route('konsentrasi.index')->with('status',"Data Berhasil Ditambah");
        }else{
            return back()->withInput()->with('error',"Data Gagal Ditambah");
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results = Konsentrasi::findOrFail($id);
        return view('operator.konsentrasi.konsentrasi_edit',compact(['results']));
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
            'nama_konsentrasi' => ['string', 'max:70', 'unique:konsentrasi,nama_konsentrasi,'.$id.',id_konsentrasi'],
            'status' => 'required'
            ]);
        $data = $request->all();
        $data['nama_konsentrasi'] = ucwords(strtolower($data['nama_konsentrasi']));
        $konsentrasi = Konsentrasi::findOrFail($id);
        $data['status']=(int)$request->get('status');//merubah tipe data selectbox
        // dd($data);
        $konsentrasi->update($data);
        return redirect()->route('konsentrasi.index')->with('status',"Data Berhasil Diperbarui");
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
