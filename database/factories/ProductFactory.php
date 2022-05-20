<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'price' => $this->faker->numberBetween(0,10000),
            'offer' => $this->faker->numberBetween(0,100),
            'type_id' => random_int(1,4),
            'description' => $this->faker->text(1200)
        ];
    }
}
