<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\Companies; // companies modelini ekledik


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompaniesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //fake girislerimizi girdik
            'name' => fake()->company(),
            'address' => fake()->address(),
            'phone' => $this->faker->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'web_site' => fake()->word() . '.com',
            'logo' => fake()->imageUrl(100, 100, 'company'),
        ];
    }
}