<?php

namespace Database\Factories;

use App\Models\Propietario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Propietario>
 */
class PropietarioFactory extends Factory
{
    protected $model = Propietario::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nombre" => $this->faker->name(),
            "apellidos" => $this->faker->lastName(),
            "correo" => $this->faker->unique()->safeEmail(),
            "telefono" => $this->faker->unique()->phoneNumber(),
        ];
    }
}
