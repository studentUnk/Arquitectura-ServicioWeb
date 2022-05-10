<?php

namespace App\Http\Controllers;

use App\Models\Detalle_reserva;
use Illuminate\Http\Request;

class DetalleReservaController extends Controller
{

    /**
     * Buscar todos los asientos registrados para una funcion
     */
    public function buscarCompraFuncion($numero_funcion)
    {
        $reserva = Detalle_reserva::all()->where('numero_funcion', $numero_funcion);
        return $reserva;
    }

    /**
     * Crear reserva asociada a una venta
     */
    public function crear_reserva($numero_ingreso, $numero_funcion, $numero_asiento, $valor_funcion)
    {
        $reserva = new Detalle_reserva();
        $reserva->numero_ingreso = $numero_ingreso;
        $reserva->numero_funcion = $numero_funcion;
        $reserva->numero_asiento = $numero_asiento;
        $reserva->valor_funcion = $valor_funcion;
        $reserva->save();
        
        return True;
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
     * @param  \App\Models\Detalle_reserva  $detalle_reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Detalle_reserva $detalle_reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detalle_reserva  $detalle_reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Detalle_reserva $detalle_reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detalle_reserva  $detalle_reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detalle_reserva $detalle_reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detalle_reserva  $detalle_reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detalle_reserva $detalle_reserva)
    {
        //
    }
}
