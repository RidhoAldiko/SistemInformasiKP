@extends('layouts.main')
@section('title','Proposal')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item"><a href="{{route('dospem.index')}}">Proposal</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Proposal</li>
    </ol>
</nav>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Proposal</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td class="text-right">Judul Kerja Praktek</td>
                            <td>
                                <p class="border-bottom text-gray-800">
                                    {{$data->judul}}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">Nama Instansi</td>
                            <td>
                                <p class="border-bottom text-gray-800">
                                    {{$data->nm_instansi}}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">alamat Instansi</td>
                            <td>
                                <p class="border-bottom text-gray-800">
                                    {{$data->alamat_instansi}}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">Pembimbing Instansi</td>
                            <td>
                                <p class="border-bottom text-gray-800">
                                    {{$data->bimbing_instansi}}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">Rekomendasi Dari</td>
                            <td>
                                <p class="border-bottom text-gray-800">
                                    {{$data->rekomendasi}}
                                </p>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="text-right">Waktu KP</td>
                            <td>
                                <p class="border-bottom text-gray-800">
                                    {{$data->waktu_kp}}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-right">Tanggal Pengajuan</td>
                            <td>
                                <p class="border-bottom text-gray-800">
                                    {{date('d-m-Y',strtotime($data->created_at))}}
                                </p>
                            </td>
                        </tr>

                        @if ($data->nid != NULL)
                            <tr>
                                <td class="text-right">Nama Dosen Pembimbing</td>
                                <td>
                                    <p class="border-bottom text-gray-800">
                                        {{$data->dosen['nm_dosen']}}
                                    </p>
                                </td>
                            </tr>
                                    @if ($data->status == 4 || $data->status == 6)
                                    <tr>
                                        <td class="text-right text-danger">Catatan Pembiming</td>
                                        <td>
                                            <p class="border-bottom text-gray-800">
                                                {{$data->catatan}}
                                            </p>
                                        </td>
                                    </tr>
                                    @endif
                                @endif
                    </tbody>
                </table>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body" align="center">
                    <img src="{{Storage::url('pdf.png')}}" class="img-thumbnail shadow mb-3" alt="Profil" width="100px">
                    <a href="{{Storage::url($data->file_proposal)}}" target="_blank" style="background-color: #f0ad4e; border-color: #f0ad4e;" class="btn btn-primary d-block"><i class="fas fa-cloud-download-alt"></i> Download</a>
                </div>
            </div>
        </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <a href="{{route('proposal.index')}}" class="btn btn-secondary"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection