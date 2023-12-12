<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Bluemmb\Faker\PicsumPhotosProvider;
use App\Models\User;
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
        $this->faker->addProvider(new PicsumPhotosProvider($this->faker));
        return [
            'galarie_title' => fake()->title(),
            'galarie_description' => fake()->paragraph(),
            'galarie_tag' => fake()->word(),
            'galarie_photo' => $this->faker->imageUrl(100,100, false,false, true),
            'user_id' => User::factory()
        ];
    }
}
