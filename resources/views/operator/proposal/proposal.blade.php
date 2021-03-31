@extends('layouts.main')
@section('title','Proposal')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item active" aria-current="page">Proposal</li>
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
        <h6 class="m-0 font-weight-bold text-primary">Data Proposal</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="text-gray-800 table table-bordered table-hover table-striped" id="dataTableProposal" width="100%" cellspacing="0">
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
                    <th>File</th>
                    <th>Aksi</th>
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
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($items as $item)
                    @if ($item->status == 0)
                        <tr>
                            <td>{{$no++}}</td>
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
                                        ->count();
                                    echo $jumlah;
                                @endphp
                            </td>
                            <td class="text-center">
                                <a href="{{Storage::url($item->file_proposal)}}" target="_blank"><i class="fa fa-file-pdf fa-2x"></i></a>
                            </td>
                            <td class="text-center">
                                {{-- <a href="{{route('operator.detailPro',$item->id_proposal)}}" class="btn btn-info btn-sm" title="Detail"><i class="fa fa-eye"></i></a> --}}
                                <a href="{{route('beri-pembimbing',$item->id_proposal)}}" class="btn btn-success btn-sm" title="Terima"><i class="fa fa-check-circle"></i></a>
                                <a href="{{route('proposal.tolak',$item->id_proposal)}}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menolak Proposal Ini?');" title="Tolak"><i class="fa fa-times-circle"></i></a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            </div>
    </div>
</div>
@endsection