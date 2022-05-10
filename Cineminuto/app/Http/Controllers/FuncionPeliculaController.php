<?php

namespace App\Http\Controllers;

use App\Models\Funcion_pelicula;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\AsientoController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\DetalleReservaController;
use App\Http\Controllers\PagoController;
use Illuminate\Http\Request;

class FuncionPeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['funciones'] = Funcion_pelicula::paginate(5);
        // Referencias para obtener elementos especificos en base a las llaves foraneas
        $horarioC = new HorarioController();
        $peliculaC = new PeliculaController();
        $salaC = new SalaController();

        foreach ($datos['funciones'] as $d)
        {
            $d->numero_horario = $horarioC->index($d->numero_horario)->hora_inicio . '-' . $horarioC->index($d->numero_horario)->hora_fin;
            $d->numero_pelicula = $peliculaC->getPelicula($d->numero_pelicula)->nombre_pelicula;
            $d->numero_sala = $salaC->getSala($d->numero_sala)->nombre_sala;
        }

        return view('funcion_pelicula.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('funcion_pelicula.create'); // Retornar vista detalle
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
     * @param  \App\Models\Funcion_pelicula  $funcion_pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Funcion_pelicula $funcion_pelicula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Funcion_pelicula  $funcion_pelicula
     * @return \Illuminate\Http\Response
     */
    //public function edit(Funcion_pelicula $funcion_pelicula)
    public function edit($funcion_pelicula)
    {
        //
        //
        $funcion = Funcion_Pelicula::findOrFail($funcion_pelicula);

        $peliculaC = new PeliculaController();
        $pelicula = $peliculaC->getPelicula($funcion->numero_pelicula);
        $asientoC = new AsientoController(); 
        $asiento = $asientoC->getAsientosSala($funcion->numero_sala);

        $funcion->numero_pelicula = $peliculaC->getPelicula($funcion->numero_pelicula)->nombre_pelicula; // Agregar nombre pelicula
        $max_cf = $asientoC->getMaxCol_Fil($funcion->numero_sala);
        $max_asiento = $asientoC->getMaxAsientos();
        $disponible = $asientoC->getDisponible();

        // Verificar que el asiento este disponible
        $detalleC = new DetalleReservaController();
        $asientosReservados = $detalleC->buscarCompraFuncion($funcion->numero_funcion);
        $asientoE = False;
        foreach ($asiento as $a)
        {
            foreach ($asientosReservados as $ar)
            {
                if($ar->numero_asiento == $a->numero_asiento){
                    $asientoE = True;
                    break;
                }
            }
            if($asientoE)
            {
                $a->disponible_asiento = "-";
            }
            else
            {
                $a->disponible_asiento = $disponible;
            }
            $asientoE = False;
        }

        return view('funcion_pelicula.edit',compact('funcion','pelicula','asiento','max_cf','max_asiento','disponible'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funcion_pelicula  $funcion_pelicula
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Funcion_pelicula $funcion_pelicula)
    public function update(Request $request)
    {
        //
        $funcion_pelicula = Funcion_Pelicula::findOrFail($request->funcion_pelicula);
        $ingresoC = new IngresoController();
        $detalleC = new DetalleReservaController();
        $pagoC = new PagoController();

        $m_f = $request->max_fila;
        $m_c = $request->max_col;
        $name_asiento = 0;
        
        
        $ingresoB = False;
        $numero_ingreso = -1;
        $valor_total = 0;
        $data_a = $request->collect();
        for ($i = 1; $i <= $m_f; $i++)
        {
            for($j = 1; $j <= $m_c; $j++)
            {
                $name_asiento = "s" . strval(($i*$request->max_asiento)+$j);
                
                if(isset($data_a[$name_asiento]))
                {
                    // Generar ingreso de la compra general
                    if(!$ingresoB){
                        if ($ingresoC->crear_ingreso(auth()->user()->id))
                        {                            
                            $numero_ingreso = $ingresoC->obtener_ultimo_registro(auth()->user()->id)[0]->numero_ingreso;
                            $ingresoB = True;
                        }                    
                        else
                        {
                            // Error--> pendiente
                        }
                    }
                    
                    if($detalleC->crear_reserva(
                        $numero_ingreso, 
                        $funcion_pelicula->numero_funcion, 
                        $data_a[$name_asiento], 
                        $funcion_pelicula->valor_funcion) && $ingresoB)
                    {
                        $valor_total = $valor_total + $funcion_pelicula->valor_funcion;
                    }
                    else
                    { 
                        // Error--> pendiente -> si hay un inconveniente detalle_reserva debe ajustar asientos seleccionados a null
                    }
                }
            }
        }
        
        if ($pagoC->crear_pago(
            $valor_total,
            $numero_ingreso
        )){
            return view('funcion_pelicula.success_test',compact('valor_total'));
        }
        else
        {
            // Error --> pendiente mostrar registro no exitoso de pago
        }      
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcion_pelicula  $funcion_pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcion_pelicula $funcion_pelicula)
    {
        //
    }

}
