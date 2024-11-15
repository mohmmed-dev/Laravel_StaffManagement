<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = ['project','store'];
        return [
            'name' => fake()->name(),
            'description' => fake()->text(100),
            'key' => fake()->numberBetween(10000,90000),
            'type' => $type[fake()->numberBetween(0,1)]
        ];
    }
}
