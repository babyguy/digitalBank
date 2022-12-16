<?php

namespace Database\Factories;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallet>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // ramdomFloat => (decimales, valor minimo entero,valor maximo entero)
            'balance'=> fake()->randomFloat(2,4,100000),
            // se crea el usuario desde este punto en lugar de el DatabaseSeeder para que le genere 1 wallet a cada usuario existente
            'user_id'=> User::factory()->create()->id,
        ];
    }
}
