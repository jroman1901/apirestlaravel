<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
       public function __construct()
        {
             $this->middleware('auth:api', ['except' => ['index', 'show']]);
        }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudaintes = Estudiante::all();
        $response = [
            'status' => 200,
            'data' => $estudaintes,
            'message' => 'Se han encontrado '.count($estudaintes).' resultados'
        ];
        return response()->json(
            $response,
            $response['status']
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validated();
   

        $estudiante = new  Estudiante();
        
        $estudiante->nombres = $request->input('nombres');
        $estudiante->apellidos = $request->input('apellidos');
        $estudiante->direccion = $request->input('direccion');
        $estudiante->telefono = $request->input('telefono');
       
       
        $res = $estudiante->save();

        if ($res) {
            return response()->json(['message' => 'Registro Creado con exito'], 201);
        }
        return response()->json(['message' => 'Error al crear el registro'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudiante $estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudiante $estudiante)
    {
        //
    }
}
