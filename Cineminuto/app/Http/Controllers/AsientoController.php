<?php

namespace App\Http\Controllers;

use App\Models\Asiento;
use Illuminate\Http\Request;

class AsientoController extends Controller
{    
    /**
     * Obtener todos los asientos en base a una sala
     */
    public function getAsientosSala($sala){
        $asientos = Asiento::all()->where('numero_sala',$sala); // Obtener todos los asientos de la sala
        
        return $asientos;
    }

    /**
     * Retonar constante de valor maximo de asientos por fila
     */
    public function getMaxAsientos(){
        return Asiento::max_asientos;
    }

    /**
     * Retonar constante de valor asientos disponibles
     */
    public function getDisponible(){
        return Asiento::asiento_disponible;
    }

    /**
     * Obtener maxima columna en asientos
     */
    public function getMaxCol_Fil($sala){
        $asientos = Asiento::all()->where('numero_sala',$sala);
        $max_col = 0; 
        $max_fil = 0; 
        $mod = 0;
        $div = 0;
        //$c_f = array();
        foreach ($asientos as $a)
        {
            $mod = $a->posicion_asiento % Asiento::max_asientos;// Modulo para obtener columna
            $div = intval($a->posicion_asiento / Asiento::max_asientos);// Division para obtener filas
            if($mod > $max_col)
            {
                $max_col = $mod; // Actualizar valor maximo de columna
            }
            if($div > $max_fil)
            {
                $max_fil = $div; // Actualizar valor maximo de fila
            }
        }
        //array_push($c_f, $max_col);
        //array_push($c_f, $max_);
        return compact('max_col','max_fil');
    }

    /**
     * Retornar toda la informacion de un asiento en especifico
     */
    public function getAsiento($asiento_i)
    {
        $asiento = Asiento::findOrFail($asiento_i);
        return $asiento;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asiento  $asiento
     * @return \Illuminate\Http\Response
     */
    public function show(Asiento $asiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asiento  $asiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Asiento $asiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asiento  $asiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asiento $asiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asiento  $asiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asiento $asiento)
    {
        //
    }
}
