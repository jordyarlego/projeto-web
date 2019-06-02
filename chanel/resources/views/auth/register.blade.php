@extends('layouts.auth')

@section('content')
<div class="user_card">
        <div class="d-flex justify-content-center">
            <div class="brand_logo_container">
                <a href="/">
            <img src="{{asset('/img/logo_auth.png')}}" class="brand_logo" alt="Logo">
            </a>
            </div>
        </div>
        <div class="d-flex justify-content-center form_container">
        <form action="{{route('register')}}" method="POST">
                @csrf

                <div class="text-center" style="padding:10px;">

                <span style="font-size:1.4em;margin-bottom:0px;padding-bottom:0px;">Criar conta</span><br>
                <small>É rapidinho :P</small>
            </div>

                <div class="input-group mb-2">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nome" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                <div class="input-group mb-2">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Senha" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="input-group mb-2">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Senha" required autocomplete="new-password">
                    </div>
            
        </div>
        <div class="d-flex justify-content-center mt-3 login_container">
            <button type="submit" name="button" class="btn login_btn">Register</button>
        </div>
    </form>
        <div class="mt-4">
            <div class="d-flex justify-content-center links">
                Already have account? <a href="/login" class="ml-2">Login</a>
            </div>
            <div class="d-flex justify-content-center links">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
