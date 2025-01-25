@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Detalji o knjizi</h1>

    <table class="table table-bordered shadow-lg">
        <thead class="table-primary">
            <tr>
                <th colspan="2" class="text-center">{{ $knjiga->naziv }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Autor:</strong></td>
                <td>{{ $knjiga->autor }}</td>
            </tr>
            <tr>
                <td><strong>Opis:</strong></td>
                <td>{{ $knjiga->opis }}</td>
            </tr>
            <tr>
                <td><strong>Status:</strong></td>
                <td>
                    @if ($knjiga->status === 'dostupna')
                        <span class="text-success">Dostupna</span>
                    @else
                        <span class="text-danger">Rezervisana</span>
                    @endif
                </td>
            </tr>

            @if ($knjiga->status === 'dostupna')
                <tr>
                    <td><strong>Datum od:</strong></td>
                    <td>
                        <form action="{{ route('rezervacijas.store') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="knjiga_id" value="{{ $knjiga->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="date" name="rezervisana_od" id="rezervisana_od" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" name="rezervisana_do" id="rezervisana_do" class="form-control" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 w-100">Rezerviši</button>
                        </form>
                    </td>
                </tr>
            @else
               
            @endif
        </tbody>
    </table>

    <div class="mt-4 text-center">
        <a href="{{ route('home') }}" class="btn btn-secondary">Nazad na listu</a>
    </div>
</div>
@endsection
