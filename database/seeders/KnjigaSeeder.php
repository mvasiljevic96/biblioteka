<?php

namespace Database\Seeders;

use App\Models\Knjiga;
use Illuminate\Database\Seeder;

class KnjigaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Knjiga::create([
            'naziv' => 'Mali princ',
            'autor' => 'Antoine de Saint-Exupéry',
            'opis' => 'Mali princ je filozofska priča o dečaku koji istražuje različite svetove i otkriva duboke životne istine kroz susrete s neobičnim likovima.',
            'status' => 'dostupna',
        ]);
        
        Knjiga::create([
            'naziv' => 'Na Drini ćuprija',
            'autor' => 'Ivo Andrić',
            'opis' => 'Roman opisuje istoriju jedne mostarske ćuprije, koja je svedok promena u životima ljudi i društvenih okolnosti tokom vekova.',
            'status' => 'dostupna',
        ]);
        
        Knjiga::create([
            'naziv' => 'Orkanski visovi',
            'autor' => 'Emily Brontë',
            'opis' => 'Priča o strasti, ljubavi i osveti, smeštena u divljim i surovim pejzažima engleskog Jorka.',
            'status' => 'dostupna',
        ]);
        
        Knjiga::create([
            'naziv' => 'Zločin i kazna',
            'autor' => 'Fjodor Dostojevski',
            'opis' => 'Roman koji istražuje psihološke dileme siromašnog studenta koji se odlučuje na ubistvo, ali ga progoni osećaj krivice.',
            'status' => 'dostupna',
        ]);
        
        Knjiga::create([
            'naziv' => 'Veliki Getsbi',
            'autor' => 'F. Scott Fitzgerald',
            'opis' => 'Priča o ljubavi, ambicijama i propasti američkog sna tokom ludih dvadesetih godina prošlog veka.',
            'status' => 'rezervisana',
        ]);
        
        Knjiga::create([
            'naziv' => 'Ana Karenjina',
            'autor' => 'Lav Tolstoj',
            'opis' => 'Tragična priča o ljubavi i društvenim normama, smeštena u aristokratsku Rusiju 19. veka.',
            'status' => 'dostupna',
        ]);
        
        Knjiga::create([
            'naziv' => 'Alhemičar',
            'autor' => 'Paulo Koeljo',
            'opis' => 'Inspirativna priča o mladiću Santjagu koji kreće na putovanje da otkrije svoje životno poslanje.',
            'status' => 'dostupna',
        ]);
        
        Knjiga::create([
            'naziv' => 'Prohujalo s vihorom',
            'autor' => 'Margaret Mičel',
            'opis' => 'Epska ljubavna priča smeštena u doba Američkog građanskog rata, fokusirana na lik Skarlet O’Hara.',
            'status' => 'rezervisana',
        ]);
        
        Knjiga::create([
            'naziv' => 'Sto godina samoće',
            'autor' => 'Gabriel Garsija Markes',
            'opis' => 'Magijski realizam u priči o porodici Buendija, njenim usponima i padovima u imaginarnom gradu Makondo.',
            'status' => 'dostupna',
        ]);
        
        Knjiga::create([
            'naziv' => 'Gospodar prstenova',
            'autor' => 'J.R.R. Tolkien',
            'opis' => 'Prvi deo epske fantastične trilogije o borbi dobra i zla u zemlji Srednje zemlje.',
            'status' => 'dostupna',
        ]);
        
    }
}
