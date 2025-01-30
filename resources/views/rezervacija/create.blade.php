@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">Online Plaćanje</h2>
        <form action="{{ route('rezervacijas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="ime_prezime" class="form-label">Ime i Prezime</label>
                <input type="text" class="form-control" id="ime_prezime" name="ime_prezime" required>
            </div>
            <div class="mb-3">
                <label for="broj_kartice" class="form-label">Broj Kartice</label>
                <input type="text" class="form-control" id="broj_kartice" name="broj_kartice" required>
            </div>
            <div class="mb-3">
                <label for="datum_isteka" class="form-label">Datum Isteka</label>
                <input type="month" class="form-control" id="datum_isteka" name="datum_isteka" required>
            </div>
            <div class="mb-3">
                <label for="cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cvv" name="cvv" required>
            </div>


            
                <div class="row">
                    <div class="col-md-6">
                        <input type="date" name="rezervisana_od" id="rezervisana_od" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <input type="date" name="rezervisana_do" id="rezervisana_do" class="form-control" required>
                    </div>
                </div>
                
           
            <div class="text-center">
                <button type="submit" class="btn btn-primary mt-3 w-100">Rezerviši</button>
                <button type="submit" class="btn btn-success">Plati</button>
            </div>
        </form>
    </div>
</div>
@endsection
