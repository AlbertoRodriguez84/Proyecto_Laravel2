<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Profesor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profesores = Profesor::all();

        // Crear alumnos y asignar un profesor aleatorio a cada uno
        for ($i = 0; $i < 50; $i++) {
            $alumno = Alumno::factory()->create([
                'profesor_id' => $profesores->random()->id,
            ]);
        }
    }
}
