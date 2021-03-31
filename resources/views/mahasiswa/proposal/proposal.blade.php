@extends('layouts.main')
@section('title','Proposal')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item active" aria-current="page">Data Proposal</li>
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
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (count($proposal) > 0)
@if ($proposal[0]->status == 2)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Proposal KP Anda Ditolak. Silahkan Lengkapi seluruh dokumen yang dibutuhkan, Lalu Ajukan Ulang Proposal KP Anda.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif($proposal[0]->status == 4)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Proposal KP anda terkena revisi. silahkan perbaiki proposal anda, Lalu Ajukan Ulang proposal KP.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@endif
@if($ending == true)
@if ($ending->status == 3 || $ending->status == 5)
    @empty($berkas[0]->nm_berkas)
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            Upload Sk Kerja Praktek Terlebih Dahulu Sebelum Memulai Bimbingan. Klik Menu SK KP > Upload SK
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endempty
@endif
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Proposal</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="text-gray-800 table table-bordered table-hover table-striped" id="dataProposalMhs" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->judul}}</td>
                            <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
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
                            <td class="text-center">
                                <a href="{{route('proposal.show',$item->id_proposal)}}" class="btn btn-info btn-sm" title="Detail">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @if ($item->status == 0)
                                <a href="{{route('proposal.edit',$item->id_proposal)}}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection