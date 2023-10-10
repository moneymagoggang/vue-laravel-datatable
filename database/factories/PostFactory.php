<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(8);

        return [
            'title' => $title,
            'slug' => Str::slug(
                title: $title,
            ),
            'content' => $this->faker->paragraph(),
            'published' => $this->faker->boolean(
                chanceOfGettingTrue: 85,
            ),
            'category_id' => Category::factory(),
        ];
    }

    public function published(): static
    {
        return $this->state(fn (array $attributes): array => [
            'published' => true,
        ]);
    }

    public function draft(): static
    {
        return $this->state(fn (array $attributes): array => [
            'published' => false,
        ]);
    }
}
