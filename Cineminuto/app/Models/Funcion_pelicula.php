<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcion_pelicula extends Model
{
    protected $primaryKey = 'numero_funcion'; // Sobrescribir llave primaria 

    public $timestamps = true; // Permitir agregar valores de creacion y actualizacion
    use HasFactory;
}
