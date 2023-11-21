<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\DietaryPreference;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'company_id' => Company::factory()->create()->id,
            'dietary_preference_id' => DietaryPreference::factory()->create()->id,
            'phone_numbers' => json_encode([$this->faker->randomNumber(9),$this->faker->randomNumber(9)]),
        ];
    }
}
