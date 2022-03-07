<?php
namespace Modules\CupAnag\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CupAnagProfessione;
use App\Models\CupAnagStatoCivile;

class CupAnagTipologieAffiliazioniTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tipologieAnagrafiche = [
            'ORD' => 'Socio ordinario',
            'SPE' => 'Socio speciale',
        ];

        foreach ($tipologieAnagrafiche as $codice => $nomeIt) {
            \App\Models\CupAnagTipologiaAffiliazione::create([
                'codice' => $codice,
                'nome_it' => $nomeIt,
            ]);
        }

    }
}
