@extends('layouts.main')

@section('title','Konsentrasi')

@section('content')

<div class="row justify-content-center">
    {{-- batas --}}
    <div class="col-sm-10 col-md-10">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{route('dospem.index')}}">Konsentrasi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah Data Konsentrasi</li>
            </ol>
        </nav>
        <div class="card shadow mb-5 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Data Konsentrasi</h6>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{route('konsentrasi.update',$results->id_konsentrasi)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nama_konsentrasi" class="text-right control-label col-form-label">Nama Konsentrasi</label>
                                        <input type="nama_konsentrasi" class="form-control @error('nama_konsentrasi') is-invalid @enderror" name="nama_konsentrasi" placeholder="nama_konsentrasi" required value="{{$results->nama_konsentrasi}}">
                                        @error('nama_konsentrasi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-right control-label col-form-label">Status Konsentrasi</label>
                                        <select name="status" class="form-control" >
                                            <option value="0"
                                            @if ($results->status == 0)
                                                selected
                                            @endif
                                            >Aktif</option>
                                            <option
                                            @if ($results->status == 1)
                                                    selected
                                                @endif
                                            value="1">Nonaktif</option>
                                        </select>
                                        @error('status')
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
                                        <a href="{{route('konsentrasi.index')}}" class="btn btn-secondary "><i class="fas fa-chevron-circle-left"></i> Kembali</a>
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
