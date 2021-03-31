@extends('layouts.main')
@section('title','Proposal')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{route('proposal')}}">Proposal</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pembaruan Proposal</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pembaruan Proposal</h6>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8 ">
                        <form method="POST" action="{{route('proposal.update',$data->id_proposal)}}" enctype="multipart/form-data" >
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <input type="text" autofocus class="form-control @error('judul') is-invalid @enderror" name="judul" placeholder="Judul Kerja Praktek" required value="{{$data->judul}}">
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" autofocus class="form-control @error('nm_instansi') is-invalid @enderror" name="nm_instansi" placeholder="Nama Tempat Kerja Praktek" required value="{{$data->nm_instansi}}">
                                    @error('nm_instansi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <textarea class="form-control @error('alamat_instansi') is-invalid @enderror" name="alamat_instansi" value="{{$data->alamat_instansi}}" rows="2" placeholder="Alamat Instansi / Tempat Kerja Praktek" >{{$data->alamat_instansi}}</textarea>
                                @error('alamat_instansi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control @error('bimbing_instansi') is-invalid @enderror" name="bimbing_instansi" placeholder="Nama Pembimbing Instansi" required value="{{$data->bimbing_instansi}}">
                                    @error('bimbing_instansi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control @error('waktu_kp') is-invalid @enderror" name="waktu_kp" placeholder="Waktu Pelaksanaan KP" required value="{{$data->waktu_kp}}">
                                    @error('waktu_kp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <select class="form-control  @error('rekomendasi') is-invalid @enderror" id="rekomendasi" name="rekomendasi">
                                    <option>--- Rekomendasi Dosen ---</option>
                                    <option value="Tidak Ada"
                                            @if ('Tidak Ada' == $data->rekomendasi)
                                                selected
                                            @endif
                                        >Tidak Ada</option>
                                        @foreach ($dosen as $item)
                                            <option value="{{$item->nm_dosen}}"
                                                @if ($item->nm_dosen == $data->rekomendasi)
                                                    selected
                                                @endif
                                                >
                                                {{$item->nm_dosen}}
                                            </option>
                                        @endforeach
                                </select>
                                @error('rekomendasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('file_proposal') is-invalid @enderror" id="validatedCustomFile" name="file_proposal" value="{{$data->file_proposal}}">
                                        <label class="custom-file-label" for="validatedCustomFile">Ganti Proposal
                                        </label>
                                        <span class="text-info">*File berformat pdf.</span><br>
                                        <span class="text-info">*Maksimal file berukuran 512 KB.</span>
                                        @error('file_proposal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="border-top">
                                <div class="float-right mt-2">
                                    <button type="submit" style="background-color: #f0ad4e; border-color: #f0ad4e;" class="btn btn-primary " ><i class="fas fa-save"></i> Simpan</button>
                                </div>
                                <div class="float-left">
                                    <a href="{{route('proposal.index')}}" class="btn btn-secondary "><i class="fas fa-chevron-circle-left"></i> Kembali</a>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection