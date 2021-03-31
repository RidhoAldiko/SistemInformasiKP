@extends('layouts.main')
@section('title','Mahasiswa')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
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
        <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="text-gray-800 table table-bordered table-hover table-striped" id="dataTableMahasiswa" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Konsentrasi</th>
                    <th>Tanggal Daftar</th>
                    <th>No. HP</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Konsentrasi</th>
                    <th>Tanggal Daftar</th>
                    <th>No. HP</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($results as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->npm}}</td>
                    <td>{{$item->nm_mhs}}</td>
                    <td>{{$item->email_mhs}}</td>
                    <td>{{$item->nama_konsentrasi}}</td>
                    <td>{{ date('d-m-Y',strtotime($item->created_at))}}</td>
                    <td>{{$item->nohp}}</td>
                    <td>
                        @if ($item->flag == 0)
                            Aktif
                        @elseif ($item->flag == 1)
                            Nonaktif
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{route('edit-mahasiswa',$item->npm)}}" class="btn btn-warning btn-sm text-white" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
    </div>
</div>
@endsection