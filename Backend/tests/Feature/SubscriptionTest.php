<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use App\Domains\Users\Models\User;
use App\Domains\Companies\Models\Company;
use App\Domains\Plans\Models\Plan;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_a_subscription()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);

        $company = Company::factory()->create();
        $plan = Plan::factory()->create();

        $response = $this->postJson('/api/subscriptions', [
            'company_id' => $company->id,
            'plan_id' => $plan->id,
            'starts_at' => now()->toDateString(),
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['company_id' => $company->id]);

        $this->assertDatabaseHas('subscriptions', [
            'company_id' => $company->id,
            'plan_id' => $plan->id,
        ]);
    }
}
