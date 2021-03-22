@extends('layouts.auth')
@section('title','Masuk')
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
                                <h1 class="h4 text-gray-900 "><b>Silahkan masuk</b></h1>
                                <p>Masuk untuk mengakses halaman dashboard</p>
                            </div>
                            <form class="user" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Email" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheck">Ingat Saya</label>
                                    </div>
                                </div>
                                <button type="submit" style="background-color: #f0ad4e; border-color: #f0ad4e;" class="btn btn-primary btn-block">
                                    Masuk
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{url('/password/reset')}}">Lupa Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{url('/register')}}">Daftar!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection