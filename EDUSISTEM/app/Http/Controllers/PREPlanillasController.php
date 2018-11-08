<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Datos_personales;
use DB;
class PREPlanillasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = DB::select("
            SELECT 
              A.id,
              A.genero, 
              A.identidad AS identidad, 
              A.nombre as nombre, 
              A.celular as celular,
              H.abreviatura as abreviatura,
              H.nombre as universidad, 
              G.departamento as depa
                FROM datos_personales A
                INNER JOIN datos_personales_has_carreras B
                ON(A.id= B.id_datos_personales)
                INNER JOIN carreras C
                ON(B.carrera_id=C.id)
                INNER JOIN facultad D
                ON(C.facultad_id=D.id)
                INNER JOIN campus E
                ON(D.campus_id=E.id)
                INNER JOIN municipio F
                ON(E.id_municipio=F.id_municipio)
                INNER JOIN departamento G
                ON(F.id_depto=G.id_depto)
                INNER JOIN universidad H
                ON(E.universidad_id=H.id)
         ");

        return view('pre_planillas/index')->with('datos',$datos);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
