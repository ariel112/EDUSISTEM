<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\departamento;
use DB;
use Carbon\Carbon;
use App\Municipios;
use App\Universidad;
use App\Campus;
use App\Facultad;
use App\Carreras;
use App\Periodo_universidad;
use App\Becas;
use App\Estado_civil;
use App\Datos_personales_has_carreras;
use App\Datos_madre;
use App\Datos_padre;
use App\persona_dependiente;
use App\Datos_personales;
use App\Actualizacion_periodo;

class ActualizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $datos = Datos_personales::all();
     
        return view('actualizacion.index')->with('datos', $datos);
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
        $actualizacion = new Actualizacion_periodo($request->all());

        $actualizacion->save();

        return redirect()->route('actualizacion.perfil',$request->id_datos_personales);
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

       

        $becarios = DB::select("                                    
                                  SELECT  
                                   A.id AS id, 
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
                                   F.id AS id_universidad,
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

        $actualizacions = DB::select("
                SELECT 
                B.id AS idd, 
                B.periodo AS periodo, 
                Date_format(B.inicio,'%Y') AS anio, 
                A.promedio_global AS globals ,
                A.promedio_periodo AS periodos
            FROM actualizacion_periodo A
            INNER JOIN calendario_universidad B
            ON(A.calendario_universidad_id= B.id)
            WHERE A.id_datos_personales='$id' ;
         ");
          
         foreach($becarios as $becario ){
            $iduni= $becario->id_universidad;
         }
          
         $periodos = DB::select("                
           
        SELECT AA.id as id, AA.periodo as periodo, AA.anio as anio
                FROM(
                SELECT   A.id as id, 
                         A.periodo AS periodo,  
                         Date_format(A.inicio,'%Y') AS anio
                FROM calendario_universidad A
                WHERE A.universidad_id= 1 AND Date_format(A.inicio,'%Y') = YEAR(NOW())
                    ) AA
                LEFT JOIN (
                SELECT b.calendario_universidad_id as id_universidad, b.id_datos_personales as datos_personales
                FROM actualizacion_periodo b
                WHERE b.id_datos_personales = '$id'
                    ) BB
                    ON(AA.id=BB.id_universidad)
                    WHERE BB.id_universidad IS NULL
                    ;
         ");

        
        return view('actualizacion/perfil')->with("becarios",$becarios)->with('periodos',$periodos)->with('actualizacions',$actualizacions);
    }



}
