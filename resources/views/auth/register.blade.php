@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- Sužavanje širine forme -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center font-weight-bold">
                    {{ __('Registracija') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Ime -->
                        <div class="form-group mb-4">
                            <input id="ime" type="text" class="form-control @error('ime') is-invalid @enderror" 
                                   name="ime" value="{{ old('ime') }}" required autocomplete="ime" autofocus 
                                   placeholder="{{ __('Ime') }}">
                            @error('ime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Prezime -->
                        <div class="form-group mb-4">
                            <input id="prezime" type="text" class="form-control @error('prezime') is-invalid @enderror" 
                                   name="prezime" value="{{ old('prezime') }}" required autocomplete="prezime" 
                                   placeholder="{{ __('Prezime') }}">
                            @error('prezime')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-4">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email" 
                                   placeholder="{{ __('Email adresa') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Lozinka -->
                        <div class="form-group mb-4">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required autocomplete="new-password" 
                                   placeholder="{{ __('Lozinka') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Potvrda lozinke -->
                        <div class="form-group mb-4">
                            <input id="password-confirm" type="password" class="form-control" 
                                   name="password_confirmation" required autocomplete="new-password" 
                                   placeholder="{{ __('Potvrdi lozinku') }}">
                        </div>

                        <!-- Dugme za registraciju -->
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary px-5">
                                {{ __('Registrujte se') }}
                            </button>

                            <!-- Link za prijavu -->
                            <p class="mt-4 mb-0 text-muted">
                                {{ __('Već imate nalog?') }}
                                <a class="text-primary font-weight-bold" href="{{ route('login') }}">
                                    {{ __('Prijavite se ovde') }}
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
