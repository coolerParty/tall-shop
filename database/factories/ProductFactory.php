<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->name;
        $price =$this->faker->numberBetween(100.00,500.99);
        return [
            'name'              => $name,
            'slug'              => Str::slug($name),
            'short_description' => $this->faker->text,  
            'description'       => $this->faker->text, 
            'regular_price'     => $price,
            'sale_price'        => $price * .10,                                 // discount 10%
            'stock_status'      => $this->faker->randomElement(['instock','outofstock']),
            'featured'          => 1,
            'quantity'          => $this->faker->numberBetween(8,500),
            'image'             => $this->faker->unique()->numberBetween(1,25) . '.jpg',
            'active'            => 1,
            'category_id'       => $this->faker->numberBetween(1,4),
        ];
    }
}
