<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Datos_personales;
use DB;
use App\Practica;
use App\Estado_estudios;

class EstatusController extends Controller
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
          A.identidad AS identidad, 
          A.nombre as  nombre, 
          A.estado_estudios AS estado, 
          A.genero as genero,
          A.fecha_estado_estudios as fecha,
          A.practica as practica,
          A.practica_inicio as practica_inicio,
          A.practica_fin as practica_fin
        FROM datos_personales A ;
          "); 
        
       

        return view('estatus/index')->with('datos', $datos);
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
       
       /*Datos personales*/
            $becario = Datos_personales::find($request->datos_personales_id);
        
        if($request->estatus=='Activo' || $request->estatus=='Inactivo' || $request->estatus=='Egresado'){

            /*Datos del estatus */
            $estado_estudios = new Estado_estudios();
            $estado_estudios->estado=$request->estatus;
            $estado_estudios->datos_personales_id=$request->datos_personales_id;
            $estado_estudios->descripcion=$request->descripcion;
            $estado_estudios->save();
            
            /*lleno informacion en los datos personales*/
            $becario->estado_estudios=$estado_estudios->estado;
            $becario->fecha_estado_estudios= $estado_estudios->created_at;
            $becario->save();
        }else{

          if($request->file('expediente')) { 
             $file=$request->file('expediente');
             $name='Practica_'.$request->identidad.'_'.time().'.'.$file->getClientOriginalExtension();
             $path = public_path().'/documentos/practica/';
             $file->move($path,$name);
                                              }
            /*Datos de la practica*/
            $practica = new Practica();
            $practica->datos_personales_id = $request->datos_personales_id;
            $practica->nombre = $request->estatus;
            $practica->inicio = $request->inicio;
            $practica->final = $request->final;
            $practica->url = $name;
            $practica->estado ='Activo';
            $practica->save();

            /*lleno informacion en los datos personales*/
            $becario->practica = $practica->nombre;
            $becario->practica_inicio = $practica->inicio;
            $becario->practica_fin =  $practica->final;
            $becario->estado_practica = 'Activo';
            $becario->save();            
        }

        return redirect()->route('estatus.perfil',$request->datos_personales_id);
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
       public function perfil($id)    
    {
        $practicas = DB::select("
         SELECT  *
        FROM practica
        WHERE datos_personales_id='$id';
         ");
        $estado_estudios = DB::select("
            SELECT *
                FROM estado_estudios 
                WHERE datos_personales_id = '$id';
         ");
        $becarios = DB::select("                                    
                                  SELECT  
                                   A.id as id,         
                                   A.id_cargo AS cargo, 
                                   A.identidad AS identidad,
                                   A.nombre AS  nombre,
                                   A.genero AS genero, 
                                   A.estado_civil AS estado_civil, 
                                   A.fecha_nacimiento AS fecha_nacimiento,
                                   A.email AS email, 
                                   A.cuenta_universitaria AS cuenta_universitaria, 
                                   A.ciudad AS ciudad,
                                   A.celular AS celular,
                                   C.nombre AS carrera,
                                   D.nombre AS facultad,
                                   E.nombre AS campus,
                                   F.nombre AS universidad,
                                   F.url_imagen AS imagenUniversidad,
                                   F.abreviatura AS abreUniversidad,
                                   G.identidad AS identidadDependiente,
                                   G.nombre_completo AS nombreDependiente,
                                   G.email AS emailDependiente,
                                   G.celular AS celularDependiente,
                                   G.parentesco AS parentesco,
                                   H.identidad AS identidadPadre,
                                   H.nombre_completo AS nombrePadre,
                                   H.email AS emailPadre,
                                   H.celular AS celularPadre,
                                   I.identidad AS identidadMadre,
                                   I.nombre_completo AS nombreMadre,
                                   I.email AS emailMadre,
                                   I.celular AS celularMadre,
                                   J.nombre AS beca,
                                   J.monto AS montoBeca,
                                   k.nombre_cargo AS cargo,
                                   K.monto AS montoCargo
                                   
                                   
                            FROM datos_personales A
                            INNER JOIN datos_personales_has_carreras B
                            ON(A.id=B.id_datos_personales)
                            INNER JOIN carreras C
                            ON(B.carrera_id=C.id)
                            INNER JOIN facultad D
                            ON(C.facultad_id=D.id)
                            INNER JOIN campus E
                            ON(D.campus_id=E.id)
                            INNER JOIN universidad F
                            ON(E.universidad_id=F.id)
                            INNER JOIN persona_dependiente G
                            ON(A.id=G.id_datos_personales)
                            LEFT JOIN datos_padre H
                            ON(A.id_padre=H.id)
                            LEFT JOIN datos_madre I
                            ON(A.id_madre=I.id)
                            INNER JOIN becas J
                            ON(A.becas_id=J.id)
                            LEFT JOIN tipo_cargo K
                            ON(A.id_cargo=K.id_cargo)
                            WHERE A.id='$id';
         ");

        $expedientes = DB::select("
            SELECT 
              B.url,
              B.periodo, 
              B.anio
                FROM datos_personales A
                INNER JOIN digitalizacion_documentos B
                ON(A.id=B.datos_personales_id)
                WHERE A.id='$id';        
                         ");
        return view('estatus/perfil')->with("becarios",$becarios)->with('expedientes',$expedientes)->with('practicas',$practicas)->with('estado_estudios',$estado_estudios);
    }

}
