<?php

namespace Database\Factories;

use App\Models\Buyer;
use App\Models\Saler;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'number_order' => 'No-'.rand(100,2000),
            'saler_id'     => Saler::all()->random()->id,
            'buyer_id'     => Buyer::all()->random()->id,
            'date'         => fake()->dateTimeInInterval('-1 week', '+3 days'),
            'hour'         => fake()->time(),
        ];
    }
}
