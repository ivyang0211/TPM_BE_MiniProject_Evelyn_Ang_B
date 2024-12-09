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
            'name' => $this->faker->randomElement(["Boeing 737", "Airbus A320", "Concorde", "Boeing 777", "Airbus A380", "Cessna 172", "Lockheed Martin F-22 Raptor", "Bombardier CRJ200", "Embraer E195", "McDonnell Douglas MD-80"]),
            'path' => $this->faker->randomElement([  "https://e3.365dm.com/21/07/2048x1152/skynews-boeing-737-plane_5435020.jpg",  "https://calaero.edu/wp-content/uploads/2023/08/iStock-1332501286-scaled.jpg",  "https://media.gq.com/photos/6508829d305ef4e0229049b3/4:3/w_1500,h_1125,c_limit/plane.jpg",  "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNc9bCOLYsKd6B03eZc5DLEE_odl2DQfSVug&s",  "https://as1.ftcdn.net/v2/jpg/01/11/22/44/1000_F_111224494_Vcl3eafzhx6Uc5GulbI2rk0eAOq0np59.jpg",  "https://images.saymedia-content.com/.image/t_share/MjAwMTUwMjI4Mzc1NDQ2NjM2/disadvantages-of-travelling-by-plane.jpg",  "https://lp-cms-production.imgix.net/2024-05/GettyImages-1303030943.jpg?w=1440&h=810&fit=crop&auto=format&q=75"]),
            'type' => $this->faker->randomElement(['Commercial Airplane','Fighter Airplane','Cargo Plane']),
            'brand' => $this->faker->randomElement(['Boeing', 'Lockheed Martin', 'Airbus']),
            'quantity' => $this->faker->randomDigitNotNull(),
            'added_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
