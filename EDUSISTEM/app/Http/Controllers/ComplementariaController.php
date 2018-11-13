<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complementaria_planilla;
use App\Datos_personales;
use DB;

class ComplementariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  

       $datos = Datos_personales::all();

       return view('planilla_complementaria/index')->with('datos', $datos);
    }



     public function perfil($id)    
    {
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

        
        
          $nombres = DB::select("
             SELECT A.id as id, A.nombre as nombre, A.estado as estado
                FROM nombre_complementaria A
                LEFT JOIN planilla_complementaria B
                ON(B.nombre_complementaria_id=A.id)
                WHERE B.nombre_complementaria_id IS NULL AND A.estado= 'Activo';       
           ");


        return view('planilla_complementaria/perfil')->with("becarios",$becarios)->with('expedientes',$expedientes)->with('nombres',$nombres); 
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

        $complementaria= new Complementaria_planilla($request->all());
        

        $complementaria->save();

    return redirect()->route('complementaria.perfil',$complementaria->datos_personales_id);
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
