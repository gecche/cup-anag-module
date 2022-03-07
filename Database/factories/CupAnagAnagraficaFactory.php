<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Database\Factories\LocalizeFakerFactoryTrait;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CupAnagAnagraficaFactory extends Factory
{

    use LocalizeFakerFactoryTrait;

    public function definition()
    {

        $this->setFakerLocale('it_IT');

        $fisicaGiuridica = rand(0, 100) > 50 ? 'G' : 'F';

        $countComuni = \App\Models\CupGeoComune::count();
        $countNazioni = \App\Models\CupGeoNazione::count();

        $countNatureGiuridiche = \App\Models\CupAnagNaturaGiuridica::count();
        $countProfessioni = \App\Models\CupAnagProfessione::count();
        $countStatiCivili = \App\Models\CupAnagStatoCivile::count();
        $countAnagrafiche = \App\Models\CupAnagAnagrafica::count();

        $naturaGiuridicaId = null;

        $professioneId = null;
        $statoCivileId = null;

        if ($fisicaGiuridica == 'F') {
            $cognome = $this->faker->lastName;
            $nome = $this->faker->firstName;
            $denominazione = $cognome . ' ' . $nome;
            $alias = '';
            $partitaIva = null;
            $codiceFiscale = $this->faker->taxId();
            $datanascita = $this->faker->dateTimeBetween('-100 years', '-18 years')->format('Y-m-d');
            $sesso = rand(0, 100) > 50 ? 'M' : 'F';

            $professioneId = rand(0, 100) > 20 ? rand(1, $countProfessioni) : null;
            $statoCivileId = rand(0, 100) > 5 ? rand(1, $countStatiCivili) : null;


        } else {
            $cognome = null;
            $nome = null;
            $denominazione = $this->faker->company;
            $alias = $this->faker->company;
            $codiceFiscale = rand(0, 100) > 90 ? $this->faker->taxId() : null;
            $partitaIva = $codiceFiscale ?: $this->faker->vatId();
            $partitaIva = strlen($partitaIva) > 11 ? substr($partitaIva, 2, 11) : $partitaIva;
            $datanascita = $this->faker->dateTimeBetween('-50 years', '-6 months')->format('Y-m-d');
            $sesso = null;

            $naturaGiuridicaId = rand(0, 100) > 10 ? rand(1, $countNatureGiuridiche) : null;
        }

        $comuneNascitaId = rand(1, $countComuni);
        $comuneResidenzaId = rand(1, $countComuni);

        $comuneNascita = \App\Models\CupGeoComune::find($comuneNascitaId);
        $comuneResidenza = \App\Models\CupGeoComune::find($comuneResidenzaId);

        $nazioneNascitaId = $comuneNascita ? $comuneNascita->nazionalita_id : null;
        $nazioneResidenzaId = $comuneResidenza ? $comuneResidenza->nazionalita_id : null;
//    $codiceFattEl = rand(0,100) > 70 ? str_pad(rand(1,100000),7,'0',STR_PAD_LEFT) : "0000000";
//    $pecFattEl = $codiceFattEl == "0000000" ? null : $this->faker->companyEmail;

        return [
            'cognome' => $cognome,
            'nome' => $nome,
            'denominazione' => $denominazione,
            'alias' => $alias,
            'fisicagiuridica' => $fisicaGiuridica,
            'codicefiscale' => $codiceFiscale,
            'partitaiva' => $partitaIva,
            'codicefiscale_errato' => false,
            'partitaiva_errata' => false,
            'datanascita' => $datanascita,

            'comunenascita_id' => $comuneNascitaId,
            'nazionalita_id' => $nazioneNascitaId,

            'naturagiuridica_id' => $naturaGiuridicaId,
            'rapplegale_id' => null,

            'sesso' => $sesso,
            'professione_id' => $professioneId,
            'stato_civile_id' => $statoCivileId,

            'indirizzo' => $this->faker->address,
            'cap' => $this->faker->postcode,
            'comuneresidenza_id' => $comuneResidenzaId,

            'localita' => $this->faker->city,
            'numero_civico' => rand(1, 100),
            'nazione_id' => $nazioneResidenzaId,

            'tel' => $this->faker->phoneNumber,
            'fax' => rand(1, 100) > 75 ? $this->faker->phoneNumber : null,
            'email' => $this->faker->email,
            'pec' => rand(1, 100) > 55 ? $this->faker->companyEmail : null,
            'url' => rand(1, 100) > 65 ? $this->faker->url : null,
            'note' => rand(1, 100) > 75 ? $this->faker->words(5, true) : null,

            'iban' => rand(1, 100) > 50 ? $this->faker->iban('IT') : null,


            'organizzazione' => 0,
            'attivo' => rand(1, 100) > 98 ? 0 : 1,

        ];
    }
}