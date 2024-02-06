<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'body' => $this->faker->realText('255'),
            'photo' => $this->faker->imageUrl(500, 500),
            'thumbnail' => $this->faker->imageUrl(100, 100),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'user_id' => rand(1, 10),
            'category_id' => rand(1, 10),
            'display' => true
        ];
    }
}
