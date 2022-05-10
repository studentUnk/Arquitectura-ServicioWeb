<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $primaryKey = 'numero_pago'; // Sobreescribir llave primaria 

    public $timestamps = true; // Permitir agregar valores de creacion y actualizacion
    use HasFactory;
}
