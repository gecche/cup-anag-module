<?php

namespace Modules\CupAnag\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\LocalizeFakerFactoryTrait;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CupAnagIndirizzoFactory extends Factory
{

    use LocalizeFakerFactoryTrait;

    public function definition()
    {

        $this->setFakerLocale('it_IT');
        $countComuni = \App\Models\CupGeoComune::count();

        $comuneId = rand(1, $countComuni);

        $comune = \App\Models\CupGeoComune::find($comuneId);


        return [
            'indirizzo' => $this->faker->address,
            'cap' => $this->faker->postcode,
            'comune_id' => $comuneId,
            'localita' => $this->faker->city,
            'numero_civico' => rand(1, 100),
            'persona_contatto' => rand(1, 100) > 80 ? $this->faker->firstName . ' ' . $this->faker->lastName : null,
            'note' => rand(1, 100) > 80 ? $this->faker->words(5, true) : null,
        ];
    }
}
