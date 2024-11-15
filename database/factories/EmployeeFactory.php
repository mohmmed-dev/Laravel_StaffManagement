<?php

namespace Database\Factories;

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
        $name = fake()->name();
        return [
            'name' => $name,
            'username' => fake()->unique()->username(),
            'image' => "https://ui-avatars.com/api/?name=".urlencode($name),
            'key' => fake()->numberBetween(10000,90000),
            'nationality' => fake()->text(15),
            'salary' => fake()->numberBetween(1000,10000),
            'age' => fake()->numberBetween(20,40),
        ];
    }
}
