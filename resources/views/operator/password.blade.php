@extends('layouts.main')

@section('title','Profile')

@section('content')

<div class="row justify-content-center">
    {{-- batas --}}
    <div class="col-sm-10 col-md-10">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{route('operator')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah password</li>
            </ol>
        </nav>
        <div class="card shadow mb-5 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Password</h6>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{route('operator.password-update',$item[0]->email)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card-body">
                                    @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 text-right control-label col-form-label">Password Lama</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control @error('passLama') is-invalid @enderror" name="passLama" placeholder="Password Lama">
                                            @error('passLama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 text-right control-label col-form-label">Password Baru</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password Baru">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 text-right control-label col-form-label">Konfirmasi Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password">
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