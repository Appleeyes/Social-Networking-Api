<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Follows;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FollowsFactory extends Factory
{
    protected $model = Follows::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'follower_id' => $this->faker->numberBetween(1, 10),
            'following_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
