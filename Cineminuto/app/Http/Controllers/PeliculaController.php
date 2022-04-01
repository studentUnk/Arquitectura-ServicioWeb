<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
# Reference views


class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['peliculas'] = Pelicula::paginate(5);

        return view('pelicula.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('pelicula.create');
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
        /*$campos=[
            'nombre_pelicula'=>'required|string|max:255',
            'director_pelicula'=>'required|string|max:255',
            'fecha_publicacion_pelicula'=>'required|string|max:255',
            'duracion_pelicula'=>'required|string|max:255'
        ];
        $mensaje=[
            //'required'=>'El :attribute es requerido' # Mensaje para todos los elementos
            'nombre_pelicula.required'=>'El nombre de la pelicula es requerido', # Mensaje unico de error
            'director_pelicula.required'=>'El director de la pelicula es requerido', 
            'fecha_publicacion_pelicula.required'=>'La fecha de publicación es requerida',
            'duracion_pelicula.required'=>'La duracion de la película es requerida' 
        ];

        $this->validate($request, $campos, $mensaje);*/
        $this->validarDatosFormulario($request);

        //$datosPelicula = request()->all(); # Obtener todos los datos
        $datosPelicula = request()->except('_token'); # Todos los datos excepto...

        // Carga de archivos
        if($request->hasFile('Element')){
            // Almacenar en la carpeta uploads que pertenece a storage/app/public
            $datosPelicula['Element']=$request->file('Element')->store('uploads','public');
        }
        // fin carga de archivos
        Pelicula::insert($datosPelicula); 
        //return response()->json($datosPelicula); # Convertir a Json
        return redirect('pelicula')->with('mensaje','La pelicula ha sido agregada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Pelicula $pelicula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    //public function edit(Pelicula $pelicula)
    public function edit($numero_pelicula)
    {
        //
        $pelicula = Pelicula::findOrFail($numero_pelicula);
        return view('pelicula.edit',compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Pelicula $pelicula)
    public function update(Request $request, $numero_pelicula)
    {
        //
        $this->validarDatosFormulario($request);

        $datosPelicula = request()->except(['_token','_method']); 
        Pelicula::where('numero_pelicula','=',$numero_pelicula)->update($datosPelicula);

        $pelicula = Pelicula::findOrFail($numero_pelicula);
        //return view('pelicula.edit',compact('pelicula')); 

        return redirect('pelicula')->with('mensaje','La pelicula ha sido actualizada exitosamente'); // Redirigir a pagina pelicula index
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    //public function destroy(Pelicula $pelicula)
    public function destroy($numero_pelicula)
    {
        //
        Pelicula::destroy($numero_pelicula); // Eliminar en base a llave primaria

        return redirect('pelicula')->with('mensaje','La pelicula ha sido eliminada exitosamente'); // Redirigir a pagina pelicula index
    }

    private function validarDatosFormulario(Request $request){
        $campos=[
            'nombre_pelicula'=>'required|string|max:255',
            'director_pelicula'=>'required|string|max:255',
            'fecha_publicacion_pelicula'=>'required|string|max:255',
            'duracion_pelicula'=>'required|string|max:255'
        ];
        $mensaje=[
            //'required'=>'El :attribute es requerido' # Mensaje para todos los elementos
            'nombre_pelicula.required'=>'El nombre de la pelicula es requerido', # Mensaje unico de error
            'director_pelicula.required'=>'El director de la pelicula es requerido', 
            'fecha_publicacion_pelicula.required'=>'La fecha de publicación es requerida',
            'duracion_pelicula.required'=>'La duracion de la película es requerida' 
        ];
        $this->validate($request, $campos, $mensaje);
    }
}
