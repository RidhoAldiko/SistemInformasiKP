@extends('layouts.auth')
@section('title','Daftar')
@section('form')
<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-3">
                            <div class="text-center">
                                <a href="#"><img src="{{url('/img/logo-uir.png')}}" class="img-fluid" alt="logo"></a>
                                <h1 class="h4 text-gray-900 "><b>Silahkan Daftar</b></h1>
                                <p>Daftar untuk memulai kerja paraktek</p>
                            </div>
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <input type="nm_mhs" class="form-control form-control @error('nm_mhs') is-invalid @enderror" id="nm_mhs" name="nm_mhs" value="{{ old('nm_mhs') }}" aria-describedby="namaHelp" placeholder="Nama Lengkap" required>
                                        @error('nm_mhs')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email Mahasiswa" aria-describedby="inputGroupPrepend1" value="{{old('email')}}" required>
                                        <div class="input-group-append">
                                        <span class="input-group-text">@student.uir.ac.id</span>
                                        </div>
                                        @error('email_mhs')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control @error('npm') is-invalid @enderror" name="npm" id="npm" placeholder="NPM" value="{{old('npm')}}" required>
                                    @error('npm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <select class="form-control  @error('id_konsentrasi') is-invalid @enderror" id="id_konsentrasi" name="id_konsentrasi">
                                        <option>--- Tentukan Konsentrasi ---</option>
                                        @foreach ($konsentrasi as $item)
                                            @if ($item->id_konsentrasi != NULL)
                                                <option value="{{$item->id_konsentrasi}}">{{$item->nama_konsentrasi}}</option>
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
                                    <input type="number" class="form-control @error('nohp') is-invalid @enderror" name="nohp" id="nohp" placeholder="No. Handphone" value="{{old('nohp')}}" required>
                                    @error('nohp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Password (Min 8 Karakter)" required>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required autocomplete="new-password">
                                </div>
                                <button type="Submit" style="background-color: #f0ad4e; border-color: #f0ad4e;" class="btn btn-primary btn-block">
                                    Daftar
                                </button>
                            </form>
                            <div class="text-center my-3 ">
                                <a class="h7 text-decoration-none" href="{{url('/login')}}">Sudah Punya Akun ?</a>
                                
                            </div>
                            {{-- <div class="text-center mt-2">
                                <a href="{{url('/')}}" class="h7 my-4"><i class="fas fa-arrow-left"></i> Kembali Ke Home</a>
                            </div> --}}
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection