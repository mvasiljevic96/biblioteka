<?php

namespace App\Http\Controllers;

use App\Models\Knjiga;
use Illuminate\Http\Request;


class KnjigaController extends Controller
{

    public function create()
    {
        return view('knjiga.create');
    }

/**
 * Čuva novu knjigu u bazi.
 */
public function store(Request $request)
{
    // Kreiranje nove knjige sa podacima iz zahteva
    Knjiga::create([
        'naziv' => $request->input('naziv'),
        'autor' => $request->input('autor'),
        'opis' => $request->input('opis'),
        'status' => $request->input('status'),
    ]);

    return redirect()->route('home')->with('success', 'Nova knjiga je uspešno dodata!');
}


    public function show(Request $request, Knjiga $knjiga)
    {
        return view('knjiga.show', compact('knjiga'));
    }

 

}
