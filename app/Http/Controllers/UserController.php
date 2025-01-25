<?php

namespace App\Http\Controllers;

use App\Models\Rezervacija;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user(); // Dohvati ulogovanog korisnika

        $rezervacije = Rezervacija::where('user_id', auth()->id())->with('knjiga')->get();
    
        return view('user.index', compact('rezervacije'));
    }
}
