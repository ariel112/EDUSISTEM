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
       

       $preplanilla= DB::select(" 
            SELECT 
                           A.universidad_id, 
                           A.periodo, 
                           A.inicio,
                           A.final,
                           B.id_datos_personales,
                           C.nombre as nombre
            FROM calendario_universidad A
            LEFT JOIN actualizacion_periodo B
            ON(A.id=B.calendario_universidad_id)
            INNER JOIN datos_personales C
            ON(B.id_datos_personales=C.id)
            INNER JOIN retenido D
            ON(C.id=D.id_datos_personales)
            INNER JOIN calendario_universidad E
            ON(B.calendario_universidad_id= E.id)
            INNER JOIN universidad F
            ON(E.universidad_id=F.id)
            INNER JOIN pagos_meses_universidad G
            ON(G.universidad_id= F.id)
            WHERE  ('2018-4-8' BETWEEN A.inicio AND A.final) 
                    AND (B.promedio_global>=65 AND B.promedio_periodo>=65) 
                    AND (C.estado_estudios='Activo'  OR C.estado_practica= 'Activo')
                    AND ('2018-4-8' NOT BETWEEN C.retencion_inicio AND C.retencion_final)
                    AND (G.marzo='AMBOS PERIODO')
                    /*ES LA VARIABLE QUE VA A IR CAMBIANDO*/       
            GROUP BY      A.universidad_id, 
                           A.periodo, 
                           A.inicio,
                           A.final,
                           B.id_datos_personales,
                           C.nombre ;

         ");
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
