<?php

namespace App\Http\Controllers;

use App\Http\Requests\KnjigaStoreRequest;
use App\Http\Requests\KnjigaUpdateRequest;
use App\Models\Knjiga;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KnjigaController extends Controller
{
    public function index(Request $request): Response
    {
        $knjigas = Knjiga::all();

        return view('knjiga.index', [
            'knjigas' => $knjigas,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('knjiga.create');
    }

    public function store(KnjigaStoreRequest $request): Response
    {
        $knjiga = Knjiga::create($request->validated());

        $request->session()->flash('knjiga.id', $knjiga->id);

        return redirect()->route('knjigas.index');
    }

    public function show(Request $request, Knjiga $knjiga): Response
    {
        return view('knjiga.show', [
            'knjiga' => $knjiga,
        ]);
    }

    public function edit(Request $request, Knjiga $knjiga): Response
    {
        return view('knjiga.edit', [
            'knjiga' => $knjiga,
        ]);
    }

    public function update(KnjigaUpdateRequest $request, Knjiga $knjiga): Response
    {
        $knjiga->update($request->validated());

        $request->session()->flash('knjiga.id', $knjiga->id);

        return redirect()->route('knjigas.index');
    }

    public function destroy(Request $request, Knjiga $knjiga): Response
    {
        $knjiga->delete();

        return redirect()->route('knjigas.index');
    }
}
