<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Platform;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word() . ' ' . $this->faker->word(),
            'release_year' => $this->faker->year(),
            'developer' => $this->faker->company(),
            'publisher' => $this->faker->company(),
            'platform_id' => Platform::factory(),
            'photo' => null,
        ];
    }
}
