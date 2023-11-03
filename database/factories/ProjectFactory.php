<?php

namespace Database\Factories;

use App\Models\Pic;
use App\Models\Project;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
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
        return [
            //
            'pic_id' => Pic::factory(),
            'proj_name' => $this->faker->word,
            'dateTime' => $this->faker->dateTime(),
            'proj_status' => $this->faker->randomElement(['active', 'inactive', 'deleted']),
        ];
            
    }
}
