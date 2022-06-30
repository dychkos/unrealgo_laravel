<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Size>
 */
class SizeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $sizes = ["XS", "S", "M" , "L", "XL"];
        $randomKey = array_rand($sizes, 1);
        return [
            'value' => $sizes[$randomKey]
        ];
    }
}
