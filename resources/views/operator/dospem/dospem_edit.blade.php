@extends('layouts.main')

@section('title','Dosen')

@section('content')

    <div class="row justify-content-center">
        {{-- batas --}}
        <div class="col-sm-10 col-md-10">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="{{route('dospem.index')}}">Dosen</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ubah Data Dosen</li>
                </ol>
            </nav>
            <div class="card shadow mb-5 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ubah Data Dosen</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-center mt-3">
                            @if ($results->foto == Null)
                                <a href="{{asset('/img/undraw_profile.svg')}}" class="text-decoration-none" target="_blank">
                                    <img src="{{asset('/img/undraw_profile.svg')}}" class="rounded-circle shadow" alt="Profil" width="100px">
                                </a>
                            @else
                                <a href="{{asset('img/'.$results->foto)}}" class="text-decoration-none" target="_blank">
                                    <img src="{{asset('img/'.$results->foto)}}" class="rounded-circle shadow" alt="Profil" width="100px">
                                </a>
                            @endif
                            <h4 class="mt-2 text-primary font-weight-bold">Foto Dosen</h4>
                        </div>
                    </div>
                    <form class="form-horizontal" method="POST" action="{{route('dospem.update',$results->nid)}}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="" class="text-right control-label col-form-label">Alamat Email</label>
                                            <input type="email" class="form-control @error('email_dosen') is-invalid @enderror" name="email_dosen" placeholder="Email Dosen" required value="{{$results->email_dosen}}">
                                            @error('email_dosen')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-right control-label col-form-label">Status Dosen</label>
                                            <select name="flag" class="form-control" >
                                                <option value="0"
                                                @if ($results->user['flag'] == 0)
                                                    selected
                                                @endif
                                                >Aktif</option>
                                                <option
                                                @if ($results->user['flag'] == 1)
                                                        selected
                                                    @endif
                                                value="1">Nonaktif</option>
                                            </select>
                                            @error('flag')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="border-top py-2">
                                        <div class="float-right">
                                            <button type="submit" style="background-color: #f0ad4e; border-color: #f0ad4e;" class="btn btn-primary " ><i class="fas fa-save"></i> Simpan</button>
                                        </div>
                                        <div class="float-left">
                                            <a href="{{route('dospem.index')}}" class="btn btn-secondary "><i class="fas fa-chevron-circle-left"></i> Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- batas --}}
    </div>
@endsection
