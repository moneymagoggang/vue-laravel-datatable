<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->sentence(8);

        return [
            'name' => $name,
            'slug' => Str::slug(
                title: $name,
            ),
            'searchable' => $this->faker->boolean(
                chanceOfGettingTrue: 85,
            ),
        ];
    }

    public function searchable(): static
    {
        return $this->state(fn (array $attributes): array => [
            'searchable' => true,
        ]);
    }

    public function nonsearchable(): static
    {
        return $this->state(fn (array $attributes): array => [
            'searchable' => false,
        ]);
    }
}
