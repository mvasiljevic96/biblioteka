@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Moje rezervacije</h1>
   

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($rezervacije->isEmpty())
        <div class="alert alert-warning text-center">
            <p class="mb-0">Nemate nijednu aktivnu rezervaciju.</p>
        </div>
    @else
        <div class="d-flex justify-content-center">
            <table class="table table-bordered table-striped shadow-lg w-75">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Naziv knjige</th>
                        <th>Autor</th>
                        <th>Trajanje rezervacije</th>
                        <th>Akcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rezervacije as $rezervacija)
                        <tr>
                            <td>{{ $rezervacija->knjiga->naziv }}</td>
                            <td>{{ $rezervacija->knjiga->autor }}</td>
                            <td>{{ \Carbon\Carbon::parse($rezervacija->rezervisana_od)->format('d.m.Y') }} -
                                {{ \Carbon\Carbon::parse($rezervacija->rezervisana_do)->format('d.m.Y') }}</td>
                            <td class="text-center">
                                <form action="{{ route('rezervacijas.destroy', $rezervacija->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Da li ste sigurni da želite da poništite rezervaciju?')">
                                        Poništi
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
