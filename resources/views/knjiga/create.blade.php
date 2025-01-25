@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Dodaj novu knjigu</h1>

    <form action="{{ route('knjigas.store') }}" method="POST" class="shadow-lg p-4 rounded">
        @csrf

        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv knjige</label>
            <input type="text" name="naziv" id="naziv" class="form-control @error('naziv') is-invalid @enderror" value="{{ old('naziv') }}" required>
            @error('naziv')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control @error('autor') is-invalid @enderror" value="{{ old('autor') }}" required>
            @error('autor')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

     

        <div class="mb-3">
            <label for="opis" class="form-label">Opis</label>
            <input type="text" name="opis" id="opis" class="form-control @error('opis') is-invalid @enderror" value="{{ old('opis') }}" required>
            @error('opis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                <option value="dostupna" {{ old('status') == 'dostupna' ? 'selected' : '' }}>Dostupna</option>
                <option value="rezervisana" {{ old('status') == 'rezervisana' ? 'selected' : '' }}>Rezervisana</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Sačuvaj knjigu</button>
    </form>
</div>
@endsection
