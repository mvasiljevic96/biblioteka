@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">
        Izmena korisnika: 
        <span style="font-weight: bold; font-size: 1.2em;">{{ $korisnik->ime }} {{ $korisnik->prezime }}</span>
    </h1>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admins.update', $korisnik->id) }}" method="POST" class="shadow-lg p-4 bg-light rounded">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="ime" class="form-label">Ime</label>
            <input type="text" name="ime" id="ime" class="form-control" value="{{ $korisnik->ime }}" required>
        </div>

        <div class="mb-3">
            <label for="prezime" class="form-label">Prezime</label>
            <input type="text" name="prezime" id="prezime" class="form-control" value="{{ $korisnik->prezime }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $korisnik->email }}" required>
        </div>

        <div class="mb-3">
            <label for="tip" class="form-label">Tip korisnika</label>
            <select name="tip" id="tip" class="form-select" required>
                <option value="korisnik" {{ $korisnik->tip == 'korisnik' ? 'selected' : '' }}>Korisnik</option>
                <option value="admin" {{ $korisnik->tip == 'admin' ? 'selected' : '' }}>Administrator</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Sačuvaj izmene</button>
            <a href="{{ route('admins.index') }}" class="btn btn-secondary">Nazad</a>
        </div>
    </form>
</div>
@endsection
