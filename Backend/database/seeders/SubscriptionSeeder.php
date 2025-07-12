<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domains\Subscriptions\Models\Subscription;
use App\Domains\Companies\Models\Company;
use App\Domains\Plans\Models\Plan;

class SubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        $company = Company::first();
        $plan = Plan::first();

        if ($company && $plan) {
            Subscription::factory()->create([
                'company_id' => $company->id,
                'plan_id' => $plan->id,
                'starts_at' => now(),
                'ends_at' => null,
            ]);
        }
    }
}
