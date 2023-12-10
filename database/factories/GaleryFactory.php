<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Bluemmb\Faker\PicsumPhotosProvider;
use Database\Factories\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Galery>
 */
class GaleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker->addProvider(new PicsumPhotosProvider($faker));
        return [
            'galarie_title' => fake()->title(),
            'galarie_description' => fake()->paragraph(),
            'galarie_tag' => fake()->word(),
            'galarie_photo' => $faker()->picsumUrl(300, 300),
            'user_id' => User::factory()
        ];
    }
}
