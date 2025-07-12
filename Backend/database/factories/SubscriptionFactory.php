<?php
namespace Database\Factories;

use App\Domains\Subscriptions\Models\Subscription;
use App\Domains\Companies\Models\Company;
use App\Domains\Plans\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    protected $model = Subscription::class;

    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'plan_id' => Plan::factory(),
            'starts_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'ends_at' => $this->faker->optional()->dateTimeBetween('now', '+1 month'),
        ];
    }
}
