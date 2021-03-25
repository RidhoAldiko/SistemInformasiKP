@extends('layouts.main')
@section('title','Tambah Dosen')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb justify-content-end">
                {{-- <li class="breadcrumb-item"><a href="{{route('dospem.index')}}">Data Dosen</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Tambah Data Dosen</li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Dosen</h6>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-8 ">
                        <form method="POST" action="{{route('dospem.store')}}" >
                            @csrf
                            <div class="form-group">
                                <input type="number" class="form-control  @error('nid') is-invalid @enderror" id="nid" name="nid" value="{{old('nid')}}" placeholder="NIDN">
                                @error('nid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('email_dosen') is-invalid @enderror" name="email_dosen" id="email_dosen" placeholder="Email Dosen" aria-describedby="inputGroupPrepend1" value="{{old('email_dosen')}}" required>
                                    <div class="input-group-append">
                                    <span class="input-group-text">@eng.uir.ac.id</span>
                                    </div>
                                    @error('email_dosen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('nm_dosen') is-invalid @enderror" id="nm_dosen" name="nm_dosen" value="{{old('nm_dosen')}}" placeholder="Nama Dosen">
                                @error('nm_dosen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control @error('nohp_dosen') is-invalid @enderror" id="nohp_dosen" name="nohp_dosen" value="{{old('nohp_dosen')}}" placeholder="No. Handphone">
                                @error('nohp_dosen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{old('jabatan')}}" placeholder="Jabatan Dosen">
                                <p class="form-text h7 text-primary">Kosongkan Jika dosen tidak memiliki jabatan</p>
                                @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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