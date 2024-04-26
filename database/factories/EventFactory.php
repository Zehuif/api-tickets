<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(15),
            'artista' => $this->faker->name(15),
            'informacion' => $this->faker->text(50),
            'precio' => $this->faker->numberBetween(100, 1000),
            'inicio_evento' => $this->faker->dateTime(),
        ];
    }
}
