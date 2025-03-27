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
            'name' => fake()->catchPhrase(),
            'date' => fake()->dateTimeBetween('now', '+2 months'),
            'location' => fake()->address(),
            'capacity' => random_int(50, 100),
            'description' => fake()->paragraph()
        ];
    }
}
