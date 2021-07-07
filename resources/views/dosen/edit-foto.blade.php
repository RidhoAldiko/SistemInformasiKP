@extends('layouts.main')

@section('title','Profile')

@section('content')

<div class="row justify-content-center">
    {{-- batas --}}
    <div class="col-sm-10 col-md-10">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{route('dosen')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </nav>
        <div class="card shadow mb-5 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Data Profile</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-center mt-3">
                        @if ($item[0]->foto == Null)
                        <a href="{{asset('/img/undraw_profile.svg')}}" class="text-decoration-none" target="_blank">
                            <img src="{{asset('/img/undraw_profile.svg')}}" class="rounded-circle shadow" alt="Profil" width="100px">
                        </a>
                        @else
                        <a href="{{Storage::url($item[0]->foto)}}" class="text-decoration-none" target="_blank">
                            <img src="{{Storage::url($item[0]->foto)}}" class="rounded-circle shadow" alt="Profil" width="100px">
                        </a>
                        @endif
                        <h4 class="mt-2 text-primary font-weight-bold">{{$item[0]->nm_dosen}}</h4>
                    </div>
                </div>
                <form class="form-horizontal" method="POST" action="{{route('dosen.foto-update',$item[0]->nid)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="file_berkas" class="col-sm-3 text-right control-label col-form-label">Pilih Berkas</label>
                                        <div class="col-sm-8">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" id="validatedCustomFile" name="foto" value="{{old('foto')}}">
                                                <label class="custom-file-label" for="validatedCustomFile">Upload Foto
                                                </label>
                                                <span class="text-info">*File berformat JPEG, JPG atau PNG</span><br>
                                                <span class="text-info">*Maksimal file berukuran 200 KB.</span>
                                                @error('foto')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top py-2">
                                    <div class="float-right">
                                        <button type="submit" style="background-color: #f0ad4e; border-color: #f0ad4e;" class="btn btn-primary " onclick="return confirm('Apakah Anda Ingin Menyimpan Data Ini?');"><i class="fas fa-save"></i> Simpan</button>
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