<?php

namespace Database\Factories;

use App\Domains\Plans\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanFactory extends Factory
{
    protected $model = Plan::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'monthly_price' => $this->faker->randomFloat(2, 10, 100),
            'user_limit' => $this->faker->numberBetween(1, 10),
            'features' => ['Support', 'Unlimited Projects'],
        ];
    }
}
