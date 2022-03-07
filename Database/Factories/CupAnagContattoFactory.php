<?php

namespace Modules\CupAnag\Database\Factories;

use Database\Factories\LocalizeFakerFactoryTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CupAnagContattoFactory extends Factory
{

    use LocalizeFakerFactoryTrait;

    public function definition()
    {

        $this->setFakerLocale('it_IT');
        $contattoModel = new \App\Models\CupAnagContatto();

        $tipoArray = $contattoModel->listEnumValues('tipo');

        $tipo = \Illuminate\Support\Arr::random($tipoArray);


        switch ($tipo) {
            case 'email':
                $value = $this->faker->email;
                break;
            case 'cellulare':
                $value = $this->faker->phoneNumber;
                break;
            case 'telefono':
            case 'fax':
                $value = $this->faker->phoneNumber;
                break;
            case 'url':
                $value = $this->faker->url;
                break;
            default:
                $value = $this->faker->words(2, true);
                break;

        }


        return [
            'tipo' => $tipo,
            'value' => $value,
            'label' => rand(1, 100) > 40 ? $this->faker->words(2, true) : null,
        ];
    }
}
