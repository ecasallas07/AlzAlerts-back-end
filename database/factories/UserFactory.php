<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Bluemmb\Faker\PicsumPhotosProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new PicsumPhotosProvider($this->faker));
        return [
            'user_name' => fake()->name(),
            'user_telephone' => fake()->phoneNumber(),
            'user_email' => fake()->unique()->safeEmail(),
            'user_birth_date' => fake()->date(),
            'user_status' => fake()->randomElement(['0','1']),
            'user_photo' =>  $this->faker->imageUrl(300,100, 88,true, 3, 'webp'),
            'email_verified_at' => now()
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
