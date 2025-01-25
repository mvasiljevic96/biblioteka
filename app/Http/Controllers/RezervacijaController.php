<?php

namespace App\Http\Controllers;

use App\Http\Requests\RezervacijaStoreRequest;
use App\Http\Requests\RezervacijaUpdateRequest;
use App\Models\Rezervacija;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RezervacijaController extends Controller
{
    public function index(Request $request): Response
    {
        $rezervacijas = Rezervacija::all();

        return view('rezervacija.index', [
            'rezervacijas' => $rezervacijas,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('rezervacija.create');
    }

    public function store(RezervacijaStoreRequest $request): Response
    {
        $rezervacija = Rezervacija::create($request->validated());

        $request->session()->flash('rezervacija.id', $rezervacija->id);

        return redirect()->route('rezervacijas.index');
    }

    public function show(Request $request, Rezervacija $rezervacija): Response
    {
        return view('rezervacija.show', [
            'rezervacija' => $rezervacija,
        ]);
    }

    public function edit(Request $request, Rezervacija $rezervacija): Response
    {
        return view('rezervacija.edit', [
            'rezervacija' => $rezervacija,
        ]);
    }

    public function update(RezervacijaUpdateRequest $request, Rezervacija $rezervacija): Response
    {
        $rezervacija->update($request->validated());

        $request->session()->flash('rezervacija.id', $rezervacija->id);

        return redirect()->route('rezervacijas.index');
    }

    public function destroy(Request $request, Rezervacija $rezervacija): Response
    {
        $rezervacija->delete();

        return redirect()->route('rezervacijas.index');
    }
}
