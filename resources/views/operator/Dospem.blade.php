@extends('layouts.main')
@section('title','Tambah Dosen')
@section('content')
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
        <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIDN</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIDN</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($results as $result)
                    <tr>
                        <td>1</td>
                        <td>{{$result->nid}}</td>
                        <td>{{$result->nm_dosen}}</td>
                        <td>{{$result->email_dosen}}</td>
                        <td>{{$result->nohp_dosen}}</td>
                        <td>
                            @if ($result->jabatan == NULL)
                            ---
                            @else
                            {{$result->jabatan}}
                            @endif
                        </td>
                        <td>
                            @if ($result->user['email_verified_at'] == NULL)
                                    Menunggu Verifikasi
                                @elseif($result->user['flag'] == 0)
                                    Aktif
                                @else
                                    Non Aktif
                                @endif
                        </td>
                        <td class="text-center">
                            <a href="{{route('dospem.edit',$result->nid)}}" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection