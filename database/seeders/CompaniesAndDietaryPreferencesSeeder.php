<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\DietaryPreference;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniesAndDietaryPreferencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        for ($i = 1; $i <=4; $i++) {
            Company::factory()->create([
                'name' => 'Firma testowa nr ' . $i,
            ]);
            DietaryPreference::factory()->create([
                'name' => 'Preferencja żywieniowa nr ' . $i,
            ]);
        }

        Employee::factory(30)->create();
    }
}
