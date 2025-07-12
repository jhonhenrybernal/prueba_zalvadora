<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Domains\Companies\Models\Company;
use App\Domains\Plans\Models\Plan;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Acme Corp',
            'active_plan_id' => Plan::first()->id,
        ]);
    }
}
