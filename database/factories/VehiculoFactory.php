<?php

namespace Database\Factories;

use App\Models\Modelo;
use App\Models\Propietario;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehiculo>
 */
class VehiculoFactory extends Factory
{
    protected $model = Vehiculo::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $propietarioIds = Propietario::pluck("id")->all();
        $modeloIds = Modelo::pluck("id")->all();

        return [
            "placa" => $this->faker->regexify('[A-Z]{3}-[0-9]{3}'),
            "año_fabricacion" => $this->faker->numberBetween(1990, date('Y')),
            "id_propietario" => $this->faker->randomElement($propietarioIds),
            "id_modelo" => $this->faker->randomElement($modeloIds),
        ];
    }
}
