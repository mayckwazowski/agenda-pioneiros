<?php

namespace Database\Factories;

use App\Models\Configuration;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConfigurationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Configuration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'data_inicio' => $this->faker->date_create(),
            'data_fim'  => $this->faker->date_create(),
            'intervalo' => 20,
            'quantidade_atendentes' => 5
        ];
    }
}
