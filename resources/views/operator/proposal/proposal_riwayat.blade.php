@extends('layouts.main')
@section('title','Proposal')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item active" aria-current="page">Riwayat Proposal</li>
    </ol>
</nav>
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Riwayat Proposal</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="text-gray-800 table table-bordered table-hover table-striped" id="dataHistoryProposal" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Judul</th>
                    <th>Nama Instansi</th>
                    <th>Alamat Instansi</th>
                    <th>Pembimbing Instansi</th>
                    <th>Waktu KP</th>
                    <th>Rekomendasi</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Pengajuan Ke</th>
                    <th>Dosen Pembimbing</th>
                    <th>Status</th>
                    <th>Revisi</th>
                    <th>File</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No.</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Judul</th>
                    <th>Nama Instansi</th>
                    <th>Alamat Instansi</th>
                    <th>Pembimbing Instansi</th>
                    <th>Waktu KP</th>
                    <th>Rekomendasi</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Pengajuan Ke</th>
                    <th>Dosen Pembimbing</th>
                    <th>Status</th>
                    <th>Revisi</th>
                    <th>File</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($items as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->npm}}</td>
                            <td>{{$item->nm_mhs}}</td>
                            <td>{{$item->judul}}</td>
                            <td>{{$item->nm_instansi}}</td>
                            <td>{{$item->alamat_instansi}}</td>
                            <td>{{$item->bimbing_instansi}}</td>
                            <td>{{$item->waktu_kp}}</td>
                            <td>{{$item->rekomendasi}}</td>
                            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                            <td>
                                @php
                                    $jumlah = DB::table('proposal')
                                    ->where('npm','=',$item->npm)
                                    ->get();
                                    $urut = 1;
                                    foreach ($jumlah as $key) {
                                        if ($item->id_proposal != $key->id_proposal) {
                                            $update = $urut++;
                                            continue;
                                            echo $update;
                                        }else{
                                            $update = $urut++;
                                            echo $update;
                                        }
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    $nama = [];
                                    $nama = DB::table('dosen')
                                    ->where('nid','=',$item->nid)
                                    ->get();
                                    // dd($nama);
                                    if (count($nama) > 0) {
                                        $update = $nama[0]->nm_dosen;
                                        echo $update;
                                    }elseif(count($nama) == 0){
                                        $update = "---";
                                        echo $update;
                                    }
                                @endphp
                            </td>
                            <td>
                                @if ($item->status == 0)
                                    Mendaftar
                                @elseif ($item->status == 1)
                                    Verifikasi
                                @elseif ($item->status == 2)
                                    Ditolak
                                @elseif ($item->status == 3)
                                    Diterima
                                @elseif ($item->status == 4)
                                    Direvisi
                                @elseif ($item->status == 5)
                                    Diterima Dengan Revisi
                                @elseif ($item->status == 6)
                                    Perbaikan
                                @endif
                            </td>
                            <td>
                                @if ($item->catatan == '')
                                    {{"---"}}
                                @else
                                    {{$item->catatan}}
                                @endif
                                
                            </td>
                            
                            <td class="text-center">
                                <a href="{{Storage::url($item->file_proposal)}}" target="_blank"><i class="fa fa-file-pdf fa-2x"></i></a>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
            </div>
    </div>
</div>
@endsection