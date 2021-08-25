<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'excerpt' => $this->faker->slug(),
            'body' => Str::random(20),
            'price' => rand(5, 550),
            'category_id'=>rand(1, 10),
            'image_path'=>rand(1628757750,1655342636).'.png',
        ];
    }
}
