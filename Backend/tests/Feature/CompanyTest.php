<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use App\Domains\Users\Models\User;

class CompanyTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_a_company()
    {
        // Autenticamos un usuario de prueba
        Sanctum::actingAs(User::factory()->create(), ['*']);

        $response = $this->postJson('/api/companies', [
            'name' => 'Acme Inc',
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => 'Acme Inc']);

        $this->assertDatabaseHas('companies', [
            'name' => 'Acme Inc',
        ]);
    }
}
