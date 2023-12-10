<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VoiceNotes>
 */
class VoiceNotesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'voice_note_title' => fake()->title(),
            'voice_note_description' => fake()->paragraph(),
            'user_id' => User::factory() 
        ];
    }
}
