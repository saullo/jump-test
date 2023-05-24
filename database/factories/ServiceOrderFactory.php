<?php

namespace Database\Factories;

use App\Models\ServiceOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ServiceOrderFactory extends Factory
{
    protected $model = ServiceOrder::class;

    /**
     * Define os dados básicos do modelo ServiceOrder
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehiclePlate' => fake()->unique()->bothify('###-###'),
            'entryDateTime' => fake()->dateTime(),
            'exitDateTime' => fake()->dateTime(),
            'priceType' => fake()->randomElement(['dolar', 'real']),
            'price' => fake()->randomNumber(),
        ];
    }
}
