<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'valid_from' => now(),
            'valid_until' => now()->addMonth(),
            'service_name' => 'City Bus Monthly Pass',
            'payment_reference' => fake()->uuid(),
            'created_by' => 1,
        ];
    }
}
