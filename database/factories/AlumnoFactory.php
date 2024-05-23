<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{

    protected $model = Alumno::class;


    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'edad' => $this->faker->numberBetween(15, 80),
            'DNI' => $this->getDni(),

        ];
    }


    private function getDni(): string
    {
        $number = $this->faker->numberBetween(10000000, 99999999);
        $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
        $letra = $letras[$number % 23];
        return "$number-$letra";
    }
}
