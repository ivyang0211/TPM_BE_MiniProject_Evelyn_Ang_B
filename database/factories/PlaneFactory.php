<?php

namespace Database\Factories;

use App\Models\Plane;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plane>
 */
class PlaneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Plane::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'type' => $this->faker->randomElement(['Commercial Airplane','Fighter Airplane','Cargo Plane']),
            'brand' => $this->faker->randomElement(['Boeing', 'Lockheed Martin', 'Airbus']),
            'quantity' => $this->faker->randomDigitNotNull(),
            'added_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
