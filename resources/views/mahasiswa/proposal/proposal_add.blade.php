@extends('layouts.main')
@section('title','Tambah Dosen')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item active" aria-current="page">Pengajuan Proposal</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengajuan Proposal</h6>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8 ">
                        <form method="POST" action="{{route('proposal.store')}}" >
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control  @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{old('judul')}}" placeholder="Judul Kerja Praktek" required>
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control  @error('nm_instansi') is-invalid @enderror" id="nm_instansi" name="nm_instansi" value="{{old('nm_instansi')}}" placeholder="Nama Instansi / Tempat Kerja Praktek" required>
                                @error('nm_instansi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <textarea class="form-control @error('alamat_instansi') is-invalid @enderror" name="alamat_instansi" value="{{old('alamat')}}" rows="2" placeholder="Alamat Instansi / Tempat Kerja Praktek" ></textarea>
                                @error('alamat_instansi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control  @error('bimbing_instansi') is-invalid @enderror" id="bimbing_instansi" name="bimbing_instansi" value="{{old('bimbing_instansi')}}" placeholder="Nama Pembimbing Instansi" required>
                                @error('bimbing_instansi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control  @error('waktu_kp') is-invalid @enderror" id="waktu_kp" name="waktu_kp" value="{{old('waktu_kp')}}" placeholder="Waktu Pelaksanaan KP (cth:januari 2021)" required>
                                @error('waktu_kp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <select class="form-control  @error('id_konsentrasi') is-invalid @enderror" id="id_konsentrasi" name="id_konsentrasi">
                                    <option>--- Rekomendasi Dosen ---</option>
                                    <option>Tidak ada</option>
                                    @foreach ($results as $result)
                                        @if ($result->nid != NULL)
                                            <option value="{{$result->nid}}">{{$result->nm_dosen}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('id_konsentrasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('file_proposal') is-invalid @enderror" id="validatedCustomFile" name="file_proposal" required value="{{old('file_proposal')}}">
                                    <label class="custom-file-label" for="validatedCustomFile">Pilih Proposal
                                    </label>
                                    <span class="text-info">*File Berformat PDF.</span><br>
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
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection