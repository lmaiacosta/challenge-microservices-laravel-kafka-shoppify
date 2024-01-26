<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Product>
 */
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
    public function definition(): array
    {
        // static $index = 0;
        // $index += 1;
        return [
            'name' => fake()->word,
            'description' =>fake()->randomHtml(),
            'price' =>fake()->randomFloat(2,10,1000),
            'vendor' =>fake()->word,
            'product_type' =>fake()->word,
            'status' =>fake()->randomKey(['deleted', 'published', 'draft']),
            'quantity' =>fake()->randomNumber(),
            'image' =>fake()->unique()->imageUrl(),
            'created_at' =>fake()->dateTime,
            'updated_at' =>fake()->dateTime,
        ];
    }


}
