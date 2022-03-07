<?php

namespace Modules\CupAnag\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CupAnagDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CupAnagNatureGiuridicheTableSeeder::class);
        $this->call(CupAnagProfessioniTableSeeder::class);
        $this->call(CupAnagStatiCiviliTableSeeder::class);
        $this->call(CupAnagTipologieIndirizziTableSeeder::class);
        $this->call(CupAnagTipologieAnagraficheTableSeeder::class);
        $this->call(CupAnagTipologieAffiliazioniTableSeeder::class);
        $this->call(CupAnagAnagraficheTableSeeder::class);
        // $this->call("OthersTableSeeder");
    }
}
