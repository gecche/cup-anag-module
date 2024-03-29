<?php

namespace Modules\CupAnag\Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CupAnagProfessione;
use App\Models\CupAnagStatoCivile;

class CupAnagAnagraficheTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $countTipiIndirizzi = \App\Models\CupAnagTipologiaIndirizzo::count();
        $countTipiAnagrafiche = \App\Models\CupAnagTipologiaAnagrafica::count();

        \App\Models\CupAnagAnagrafica::factory(500)->create()->each(function ($anagrafica)
        use ($countTipiIndirizzi, $countTipiAnagrafiche) {

            /*
             * AGGIUNTA CONTATTI
             */
            $nContatti = rand(0, 100) > 45 ? rand(1, 8) : 0;

            for ($i = 1; $i <= $nContatti; $i++) {
                $anagrafica->contatti()->save(
                    \App\Models\CupAnagContatto::factory()->make([
                        'ordine' => $i - 1,
                    ])
                );
            }

            /*
             * AGGIUNTA INDIRIZZI
             */
            $nIndirizzi = rand(0, 100) > 70 ? (rand(0, 100) > 60 ? 2 : 1) : 0;

            $nIndirizzi = min($nIndirizzi, $countTipiIndirizzi);
            $tipiIndirizzi = \Illuminate\Support\Arr::random(range(1, $countTipiIndirizzi), $nIndirizzi);
            for ($i = 0; $i < count($tipiIndirizzi); $i++) {
                $anagrafica->indirizzi()->save(
                    \App\Models\CupAnagIndirizzo::factory()->make([
                        'ordine' => $i,
                        'tipologia_id' => $tipiIndirizzi[$i],
                    ]));
            }

            /*
             * AGGIUNTA RAGGRUPPAMENTI
             */
            $nRaggruppamenti = rand(0, 100) > 15 ? rand(1, $countTipiAnagrafiche) : 0;

            $raggruppamenti = \Illuminate\Support\Arr::random(range(1, $countTipiAnagrafiche), $nRaggruppamenti);
            $anagrafica->raggruppamenti()->sync($raggruppamenti);
        });

        /*
         * AGGIUNTA RAPP LEGALE
         */
        $countAnagrafiche = \App\Models\CupAnagAnagrafica::count();

        \Illuminate\Support\Facades\DB::table('cup_anag_anagrafiche')
            ->whereIn('id', [1, 251])
            ->update(['organizzazione' => 1]);

        $personeFisicheIds = \App\Models\CupAnagAnagrafica::where('fisicagiuridica', 'F')->get()
            ->pluck('id', 'id')->all();
        $personeFisicheIds = array_values($personeFisicheIds);
        $personeFisicheCount = count($personeFisicheIds);
        foreach (\App\Models\CupAnagAnagrafica::where('fisicagiuridica', 'G')->get() as $anagrafica) {
            if (rand(0, 100) <= 75) {
                continue;
            }
            $rappLegaleId = $personeFisicheIds[rand(0, $personeFisicheCount - 1)];
            $anagrafica->rapplegale_id = $rappLegaleId;
            $anagrafica->save();

        }
        /*
         * FINE AGGIUNTA RAPP LEGALE
         */
    }
}
