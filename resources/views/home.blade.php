@extends('layouts.app')

@section('content')
<div class="container my-5">
    
    
    <div class="alert alert-info text-center">
        <h4>Dragi <span style='font-weight: bold; font-size: 1.2em;'>{{ Auth::user()->ime }}</span>, dobrodošli na našu biblioteku!</h4>
        <p>Ovde možete pregledati sve dostupne knjige i rezervisati ih.</p>
    </div>
    
    
    <table class="table table-bordered table-striped shadow-lg">
        <thead class="table-primary text-center">
            <tr>
                <th>Naziv</th>
                <th>Autor</th>
                <th>Opis</th>
                <th>Status</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($knjige as $knjiga)
                <tr>
                    <td>{{ $knjiga->naziv }}</td>
                    <td>{{ $knjiga->autor }}</td>
                    <td>{{ Str::limit($knjiga->opis, 50) }}</td>
                    <td>
                        @if ($knjiga->status === 'rezervisana')
                            <span class="text-danger ">{{ $knjiga->status }}</span>
                        @else
                        <span class="text-success ">{{ $knjiga->status }}</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('knjigas.show', $knjiga->id) }}" class="btn btn-info btn-sm">Detaljnije</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-warning">Nema dostupnih knjiga.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
