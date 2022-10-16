<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type       = $this->faker->randomElement(['fixed','percent']);
        $value      = ($type === 'fixed') ? $this->faker->numberBetween(100,500) : $this->faker->randomElement([10,20,30,40,50]);
        $cart_value = ($type === 'fixed') ? $value + 500 : $this->faker->randomElement([500,600,700,800,900,1000]);
        return [
            'code'        => $this->faker->unique->numerify('#####'),
            'type'        => $type,
            'value'       => $value,
            'cart_value'  => $cart_value,
            'expiry_date' => '2025-1-1',
        ];
    }
}
