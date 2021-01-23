<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;

        return [
            'title' => $title,
            'url' => Str::slug($title),
            'excerpt' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'category_id' => rand(1, 5),
            'published_at' => Carbon::now(),
        ];
    }
}
