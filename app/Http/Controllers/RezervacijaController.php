<?php

namespace App\Http\Controllers;


use App\Models\Rezervacija;
use App\Models\Knjiga;
use Illuminate\Http\Request;


class RezervacijaController extends Controller
{
 

    public function store(Request $request)
    { 
        
        $request->validate([
            'knjiga_id' => 'required|exists:knjigas,id'
        ]);
    
        $knjiga = Knjiga::findOrFail($request->knjiga_id);
        if ($knjiga->status !== 'dostupna') {
            return redirect()->back()->with('error', 'Knjiga je već rezervisana.');
        }
    
        Rezervacija::create([
            'rezervisana_od' => $request->rezervisana_od,
            'rezervisana_do' => $request->rezervisana_do,
            'user_id' => auth()->id(),
            'knjiga_id' => $knjiga->id,
        ]);
    
       
        $knjiga->update(['status' => 'rezervisana']);
    
        return redirect()->route('home')->with('success', 'Knjiga je uspešno rezervisana.');
    }

    public function create()
    {
        
    
        return view('rezervacija.create'); 
    }





    public function destroy(Request $request, Rezervacija $rezervacija)
    {
                
        $knjiga = $rezervacija->knjiga;

                 
        if($knjiga)
        {
            $knjiga->update(['status' => 'dostupna']);
        }

        $rezervacija->delete();

               

        return redirect()->route('users.index')->with('success', 'Rezervacija je poništena.');

                    
    }
}
