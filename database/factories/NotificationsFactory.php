<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Notifications;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NotificationsFactory extends Factory
{
    protected $model = Notifications::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'type' => $this->faker->randomElement(['like', 'comment', 'follow']),
            'notifiable_id' => $this->faker->numberBetween(1, 30),
            'notifiable_type' => $this->faker->randomElement(['Post', 'User']),
            'read_at' => null,
        ];
    }
}
