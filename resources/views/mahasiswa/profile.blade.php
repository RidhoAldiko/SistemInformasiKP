@extends('layouts.main')

@section('title','Profile')

@section('content')

<div class="row justify-content-center">
    {{-- batas --}}
    <div class="col-sm-10 col-md-10">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{route('operator')}}">Dashboard</a></li>
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
                        <a href="{{route('mahasiswa.edit-foto')}}" class="text-decoration-none">
                            <h4 class="mt-2 text-primary font-weight-bold">Ganti Foto</h4>
                        </a>
                    </div>
                </div>
                <form class="form-horizontal" method="POST" action="{{route('mahasiswa.profile-update',$item[0]->npm)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 text-right control-label col-form-label">Alamat Email</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control @error('email_mhs') is-invalid @enderror" name="email_mhs" placeholder="Email" required value="{{$item[0]->email_mhs}}">
                                            @error('email_mhs')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 text-right control-label col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('nm_mhs') is-invalid @enderror" name="nm_mhs" placeholder="Nama" required value="{{$item[0]->nm_mhs}}">
                                            @error('nm_mhs')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 text-right control-label col-form-label">Konsentrasi</label>
                                        <div class="col-sm-8">
                                            <select name="konsentrasi" required class="form-control @error('konsentrasi') is-invalid @enderror">
                                                @foreach ($konsentrasi as $konsen)
                                                <option value="{{$konsen->id_konsentrasi}}" @if ($konsen->nama_konsentrasi == $item[0]->nama_konsentrasi)
                                                    selected
                                                    @endif
                                                    >
                                                    {{$konsen->nama_konsentrasi}}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('konsentrasi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 text-right control-label col-form-label">No. Handphone</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control @error('nohp') is-invalid @enderror" name="nohp" placeholder="No. HP" required value="{{$item[0]->nohp}}">
                                            @error('nohp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
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