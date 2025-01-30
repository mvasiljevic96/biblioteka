@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4"> <!-- Sužavanje širine forme -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center font-weight-bold">
                    {{ __('Prijava na sistem') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="form-group mb-4">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
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
                                   name="password" required autocomplete="current-password" 
                                   placeholder="{{ __('Lozinka') }}">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Dugme za prijavu -->
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary px-5">
                                {{ __('Prijavite se') }}
                            </button>

                            <!-- Link za registraciju -->
                            <p class="mt-4 mb-0 text-muted">
                                {{ __('Nemate nalog?') }}
                                <a class="text-primary font-weight-bold" href="{{ route('register') }}">
                                    {{ __('Registrujte se ovde') }}
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
