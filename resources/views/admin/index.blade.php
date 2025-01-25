@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Lista svih korisnika</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($korisnici->isEmpty())
        <div class="alert alert-warning text-center">
            <p class="mb-0">Nema registrovanih korisnika.</p>
        </div>
    @else
        <table class="table table-bordered table-striped shadow-lg text-center">
            <thead class="table-primary">
                <tr>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Email</th>
                    <th>Tip</th>
                    <th>Akcije</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($korisnici as $korisnik)
                    <tr>
                        <td>{{ $korisnik->ime }}</td>
                        <td>{{ $korisnik->prezime }}</td>
                        <td>{{ $korisnik->email }}</td>
                        <td>{{ $korisnik->tip }}</td> <!-- Pretpostavlja se da postoji polje 'tip' -->
                        <td>
                            <!-- Dugme za izmenu -->
                            <a href="{{ route('admins.edit', $korisnik->id) }}" class="btn btn-warning btn-sm">Izmeni</a>

                            <!-- Forma za brisanje -->
                            <form action="{{ route('admins.destroy', $korisnik->id) }}" method="POST" onsubmit="return confirm('Da li ste sigurni da želite da obrišete ovog korisnika?')" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Izbriši</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
