<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
    const max_asientos = 1000; 
    const asiento_disponible = 'Disponible';
    
    protected $primaryKey = 'numero_asiento'; // Sobreescribir llave primaria 

    public $timestamps = true; // Permitir agregar valores de creacion y actualizacion    
    use HasFactory;
}
