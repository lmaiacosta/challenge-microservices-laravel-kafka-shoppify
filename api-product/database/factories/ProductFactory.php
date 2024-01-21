<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        static $index = 0;
        $index += 1;
        return [

            'name' => $this->faker->name,

            'description' => $this->faker->randomHtml(),

            'price' => $this->faker->randomFloat(2,10,1000),

            'vendor' => $this->faker->word,

            'product_type' => $this->faker->word,

            'status' => $this->faker->randomKey(['deleted', 'published', 'draft']),

            'quantity' => $this->faker->randomNumber(),

            'image' => $this->faker->unique()->imageUrl(),

            'created_at' => $this->faker->dateTime,

            'updated_at' => $this->faker->dateTime,

        ];
    }
}
