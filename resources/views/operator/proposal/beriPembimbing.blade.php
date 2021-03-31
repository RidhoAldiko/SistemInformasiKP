@extends('layouts.main')

@section('title','Dosen')

@section('content')

    <div class="row justify-content-center">
        {{-- batas --}}
        <div class="col-sm-10 col-md-10">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="{{route('proposal')}}">Proposal</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Beri Dosen Pembimbing</li>
                </ol>
            </nav>
            <div class="card shadow mb-5 ">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Beri Dosen Pembimbing</h6>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{route('beri-pembimbing.create',$id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="nid" id="nid" class="form-control @error('nid') is-invalid @enderror">
                                            <option>--- Tentukan Pembimbing ---</option>
                                            @foreach ($dosen as $item)
                                                @if ($item->email_dosen != NULL)
                                                    <option value="{{$item->nid}}">{{$item->nm_dosen}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('nid')
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
                                            <a href="{{route('proposal')}}" class="btn btn-secondary "><i class="fas fa-chevron-circle-left"></i> Kembali</a>
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
