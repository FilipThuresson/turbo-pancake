<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->catchPhrase(),
            'desc' => $this->faker->paragraph($nbSentences = 15, $variableNbSentences = true),
            'price' => $this->faker->numberBetween($min = 100, $max = 99999),
        ];
    }
}
