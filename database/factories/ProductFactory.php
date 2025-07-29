<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = Category::all();

        return [
            'name' => $this->faker->word,
            'barcode' => $this->faker->word,
            'price' =>  $this->faker->randomFloat(2, 1, 10000),
            'category_id' => $categories->random()->id,
        ];
    }
}
