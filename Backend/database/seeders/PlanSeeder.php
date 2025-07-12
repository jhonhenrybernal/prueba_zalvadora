<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Domains\Plans\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'name' => 'Básico',
            'monthly_price' => 19.99,
            'user_limit' => 5,
            'features' => json_encode(['Chat', 'Soporte limitado']),
        ]);

        Plan::create([
            'name' => 'Empresarial',
            'monthly_price' => 49.99,
            'user_limit' => 25,
            'features' => json_encode(['Chat', 'Soporte 24/7', 'Integraciones']),
        ]);
    }
}
