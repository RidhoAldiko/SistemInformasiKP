@extends('layouts.auth')
@section('title','Reset Passsword')
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
                                <p>Masuk Email untuk mereset password</p>
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    Kami telah mengirimkan email untuk mereset password anda!
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
        
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email mahasiswa" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="form-group ">
                                        <button type="submit" style="background-color: #f0ad4e; border-color: #f0ad4e;" class="btn btn-primary btn-block">
                                            {{ __('Kirim email reset password') }}
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