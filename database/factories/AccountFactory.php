<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
// use Database\Factories\User;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Account>
 */
class AccountFactory extends Factory
{

    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_name' => fake()->name(),
            'account_email' => fake()->unique()->safeEmail(),
            'account_password' => static::$password?? Hash::make('password'),
            'user_id' => User::factory()->create()->id
        ];
    }
}
