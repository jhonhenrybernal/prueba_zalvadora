<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Domains\Plans\Models\Plan;
use App\Domains\Users\Models\User;
use Laravel\Sanctum\Sanctum;

class PlanTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_a_plan()
    {
        // Crear y autenticar usuario
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        // Hacer la petición autenticada
        $response = $this->postJson('/api/plans', [
            'name' => 'Pro',
            'monthly_price' => 19.99,
            'user_limit' => 1,
            'features' => ['Support', 'Unlimited Projects'],
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'Pro']);

        $this->assertDatabaseHas('plans', [
            'name' => 'Pro',
            'monthly_price' => 19.99,
            'user_limit' => 1,
        ]);

        $plan = Plan::where('name', 'Pro')->first();
        $this->assertNotNull($plan);
        $this->assertEquals(['Support', 'Unlimited Projects'], $plan->features);
    }
}
