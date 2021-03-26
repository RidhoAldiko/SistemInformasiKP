@extends('layouts.main')
@section('title','Tambah Dosen')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item active" aria-current="page">Konsentrasi</li>
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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Konsentrasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="text-gray-800 table table-bordered table-hover table-striped" id="dataTableKonsentrasi" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Konsentrasi</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Konsentrasi</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($results as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->nama_konsentrasi}}</td>
                    <td>
                        @if ($item->status == 0)
                            Aktif
                        @elseif ($item->status == 1)
                            Nonaktif
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{route('konsentrasi.edit',$item->id_konsentrasi)}}" class="btn btn-warning btn-sm text-white" title="Edit"><i class="fa fa-pencil-alt"> Ubah</i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
    </div>
</div>
@endsection