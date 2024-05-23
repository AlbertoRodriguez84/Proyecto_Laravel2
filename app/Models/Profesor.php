<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'DNI', 'edad', 'email'];
    public function alumnos(){

        return $this->hasMany(Alumno::class);
    }
}
