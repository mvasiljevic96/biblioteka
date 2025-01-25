<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    
    public function index()
    {
        $korisnici = User::where('tip', '!=', 'bibliotekar')->get();
        return view('admin.index', compact('korisnici')); 
    }

    public function edit($id)
    {
        $korisnik = User::findOrFail($id); 
    
        return view('admin.edit', compact('korisnik')); 
    }
    
    
    public function update(Request $request, $id)
    {
        $korisnik = User::findOrFail($id); 
    
        
        $request->validate([
            'ime' => 'required|string|max:255',
            'prezime' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $korisnik->id,
            'tip' => 'required|in:korisnik,admin,bibliotekar', 
        ]);
    
        
        $korisnik->update($request->only(['ime', 'prezime', 'email', 'tip']));
    
        return redirect()->route('admins.index')->with('success', 'Korisnik je uspešno ažuriran.');
    }

    


    public function destroy($id)
    {
        $korisnik = User::findOrFail($id); 
        
        foreach ($korisnik->rezervacijas as $rezervacija) {
            
            if ($rezervacija->knjiga) {
                $rezervacija->knjiga->update(['status' => 'dostupna']);
            }
            
            $rezervacija->delete();
        }
        $korisnik->delete(); 

        return redirect()->route('admins.index')->with('success', 'Korisnik je uspešno obrisan.');
    }
}
