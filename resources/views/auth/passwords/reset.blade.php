@extends('layouts.auth')
@section('title','Reset Password')
@section('form')
<div class="row justify-content-center">

    <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg mt-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="px-5 py-3">
                            <div class="text-center">
                                <a href="#"><img src="{{url('/img/logo-uir.png')}}" class="img-fluid" alt="logo"></a>
                                <h1 class="h4 text-gray-900 "><b>Reset Password</b></h1>
                                <p>Masukan Password Baru untuk akun {{ $email ?? old('email') }}</p>
                            </div>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                            
                                <input type="hidden" name="token" value="{{ $token }}">
                            
                                <div class="form-group">
                                        <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email"value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            
                                <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Baru" name="password" required autocomplete="new-password">
                            
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            
                                <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password Baru" required autocomplete="new-password">
                                </div>
                            
                                <div class="form-group">
                                        <button type="submit" style="background-color: #f0ad4e; border-color: #f0ad4e;" class="btn btn-primary btn-block" >
                                            Reset
                                        </button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection