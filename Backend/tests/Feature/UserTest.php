<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;
use App\Domains\Users\Models\User;
use App\Domains\Companies\Models\Company;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_registers_a_user()
    {
        Sanctum::actingAs(User::factory()->create(), ['*']);

        $company = Company::factory()->create();

        $response = $this->postJson('/api/users', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'password' => 'password',
            'company_id' => $company->id,
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['email' => 'jane@example.com']);

        $this->assertDatabaseHas('users', [
            'email' => 'jane@example.com',
            'company_id' => $company->id,
        ]);
    }
}
