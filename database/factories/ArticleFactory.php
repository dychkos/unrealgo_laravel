<?php

namespace Database\Factories;

use App\Models\Article;
use Faker\Extension\Helper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Article::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'slug' => $this->faker->word,
            'description' => $this->faker->text(),
            'short_description' => $this->faker->text(),
            'views' => $this->faker->numberBetween(1000, 9999),
            'user_id' => 1, // make User and assign the id
            'category_id' => 1, // make Category and assign the id
        ];
    }
}
