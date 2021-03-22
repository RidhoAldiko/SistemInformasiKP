@extends('layouts.auth')
@section('title','Verifikasi Email')
@section('form')
<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card o-hidden border-0 shadow-lg mt-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="px-5 py-3">
                            <div class="text-center">
                                <a href="#"><img src="{{url('/img/logo-uir.png')}}" class="img-fluid" alt="logo"></a>
                                <h1 class="h4 text-gray-900 "><b>Verifikasi Email Anda</b></h1>
                                <p>{{ __('Sebelum melanjutkan, periksa email Anda untuk link verifikasi,') }}
                                    {{ __('Jika Anda tidak menerima email') }},</p>
                            </div>
                            @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </div>
                    @endif

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" style="background-color: #f0ad4e; border-color: #f0ad4e;" class="btn btn-primary btn-block">
                            {{ __('klik di sini untuk mengirim ulang link') }}
                        </button>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection