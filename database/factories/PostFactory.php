<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->domainName,
            'description' => $this->faker->text,
            'likes' => $this->faker->numberBetween(0, 10),
            'image' => $this->faker->image,
            'is_published' => 1,
            'category_id' => Category::get()->random()->id
        ];
    }
}
