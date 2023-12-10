<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reminder>
 */
class ReminderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reminder_title' => fake()->title(),
            'reminder_subject' => fake()->word(),
            'reminder_date' => fake()->date(),
            'reminder_time' => fake()->time(),
            'user_id' => User::factory()
        ];
    }
}
