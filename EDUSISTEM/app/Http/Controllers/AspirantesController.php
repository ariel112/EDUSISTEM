<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Estado_estudios;
use App\Genero;
use App\Digitalizacion_documentos;
use Illuminate\Database\Eloquent\Collection;
class AspirantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos = Datos_personales::all();
        return view('aspirantes/index')->with('datos', $datos);
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

        
        return view('aspirantes/perfil')->with("becarios",$becarios)->with('expedientes',$expedientes);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos =  departamento::all();
        $universidades = Universidad::all();
        $becas = Becas::all();
        $estado_civils = Estado_civil::all();
      
        return view('aspirantes/create')->with('departamentos',$departamentos)->with('universidades',$universidades)->with('becas',$becas)->with('estado_civils',$estado_civils);   
         }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $madreID=0;
        $padreID=0;
 
        if($request->nombre_madre!=null){
        /*Datos de la madre*/        
        $madre = new Datos_madre();       
        $madre->identidad =$request->id_madre;
        $madre->nombre_completo =$request->nombre_madre;
        $madre->celular =$request->telefono_madre;
        $madre->save();
        $madreID=$madre->id;
        }else{

        }
        if($request->nombre_padre!=null){
        /*Datos del padre*/
        $padre = new Datos_padre();        
        $padre->identidad=$request->id_padre;
        $padre->nombre_completo=$request->nombre_padre; 
        $padre->celular=$request->telefono_padre;
        $padre->save();   
        $padreID= $padre->id;
        }else{
            
        }       
         
        /*Datos del aspirante*/
        $aspirante = new Datos_personales($request->all());
        $aspirante->id_padre = $padreID;
        $aspirante->id_madre = $madreID;
        $aspirante->identidad= $request->identidad;
        $aspirante->nombre= $request->nombre_completo;
        $aspirante->fecha_nacimiento= $request->fecha_nacimiento;
        $aspirante->ciudad= $request->ciudad;
        $aspirante->celular= $request->telefono_aspirante;
        $aspirante->email= $request->email;
        $aspirante->estado_civil= $request->estado_civil;
        $aspirante->id_municipio= $request->id_municipio;
        $aspirante->genero= $request->id_genero;
        $aspirante->becas_id=$request->becas_id;
        $aspirante->cuenta_universitaria=$request->cuenta_universitaria;
        /*lleno informacion en los datos personales*/
        $aspirante->estado_estudios='Activo';
        $aspirante->fecha_estado_estudios= $padre->created_at;        
        $aspirante->save();
          

        /*Datos de la persona dependiente*/
        $dependiente = new persona_dependiente();        
        $dependiente->id_datos_personales = $aspirante->id;
        $dependiente->identidad =$request->id_dependiente;
        $dependiente->nombre_completo =$request->nombre_dependiente;
        $dependiente->parentesco =$request->parentesco;
        $dependiente->celular =$request->telefono_dependiente;
        $dependiente->save();

         /*Datos de la carrera*/
        $carrera = new Datos_personales_has_carreras();
        $carrera->id_datos_personales =$aspirante->id;
        $carrera->carrera_id=$request->carrera_id;
        $carrera->save();

        /*Estado de los estudios del becario*/
        $estado_estudio= new Estado_estudios();
        $estado_estudio->estado= 'Activo';
        $estado_estudio->descripcion= 'Activo por el sistema';
        $estado_estudio->datos_personales_id=$aspirante->id;
        $estado_estudio->save();

          

        return redirect()->route('aspirantes.perfil',$aspirante->id);
      
    
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
        $dependiente = persona_dependiente::where('id_datos_personales',$id);
        $aspirante = Datos_personales::find($id);
        $departamentos =  departamento::all();
        $universidades = Universidad::all();
        $generos = Genero::all();
        /*se utiliza para saber los departamentos y municipios que fue seleccionado*/
        $seleccion_depa = DB::select("
                     SELECT 
                       A.id as id, 
                       A.id_municipio as id_municipio, 
                       B.municipio AS municipio, 
                       C.id_depto as id_depa, 
                       C.departamento as departamento
                        FROM datos_personales A
                        INNER JOIN municipio B
                        ON(A.id_municipio=B.id_municipio)
                        INNER JOIN departamento C
                        ON(B.id_depto=C.id_depto)            
                        WHERE A.id='$id';      
                      ");
        /*recorre el arreglo de depa y lo asigna*/            
        foreach ($seleccion_depa as $depa) {
            $variable_depa=$depa->id_depa;
            $id_municipio= $depa->id_municipio;
            $nombre_municipio=$depa->municipio;
        }

        /*se utiliza para saber las universidades que fueron seleccionadas*/
        $list_universidad= DB::select("
             SELECT 
                 A.carrera_id AS id_carrera, 
                 B.nombre as nombre_carrera, 
                 C.id as id_facultad, 
                 C.nombre as nombre_facultad,
                 D.id as id_campus, 
                 D.nombre as nombre_campus, 
                 D.universidad_id as id_universidad
                    FROM datos_personales_has_carreras A
                    INNER JOIN carreras B
                    ON(A.carrera_id=B.id)
                    INNER JOIN facultad C
                    ON(B.facultad_id=C.id)
                    INNER JOIN campus D
                    ON(C.campus_id=D.id)
                    WHERE A.id_datos_personales='$id';               
                              ");
        /*recorre el arreglo de lsit univerisdades y lo asigna*/            
        foreach ($list_universidad as $list_uni) {
           $listUnivesidad=$list_uni->id_universidad;           
           $id_campus=$list_uni->id_campus;
           $nombre_campus=$list_uni->nombre_campus;
           $id_facultad=$list_uni->id_facultad;
           $nombre_facultad=$list_uni->nombre_campus;
           $id_carrera=$list_uni->id_carrera;
           $nombre_carrera=$list_uni->nombre_carrera;
        }
        
        $dependientes = DB::select("          
          SELECT 
            A.id as id,
            A.identidad , 
            A.nombre_completo , 
            A.celular, 
            A.parentesco
            FROM persona_dependiente A
            INNER JOIN datos_personales B
            ON(A.id_datos_personales=B.id)
            WHERE id_datos_personales='$id';   
                     ");
        /*almaceno el id del la persona dependiente*/
        foreach($dependientes as $depe){
            $depenID=$depe->id;
        }
       

        $padres = DB::select("
           SELECT 
             B.id,   
             B.nombre_completo, 
             B.identidad, 
             B.celular
            FROM datos_personales A
            INNER JOIN datos_padre B
            ON(A.id_padre=B.id)
            WHERE A.id='$id' 
                     ");
        $madres = DB::select("
           SELECT
             B.id,    
             B.nombre_completo, 
             B.identidad, 
             B.celular
            FROM datos_personales A
            INNER JOIN datos_madre B
            ON(A.id_madre=B.id)
            WHERE A.id='$id' 
                     ");
        $carrerasp = DB::select(" 
            SELECT id
        FROM datos_personales_has_carreras
        where id_datos_personales='$id';
        
         ");
        /*el codigo de la carrera a modificar*/
        foreach ($carrerasp as $car) {
            $idd_carrera = $car->id;
          }


        $becas = Becas::all();
        $estado_civils = Estado_civil::all();
        return view('aspirantes.edit')->with('departamentos',$departamentos)->with('universidades',$universidades)->with('becas',$becas)->with('estado_civils',$estado_civils)->with('aspirante',$aspirante)->with('variable_depa',$variable_depa)->with('id_municipio',$id_municipio)->with('nombre_municipio',$nombre_municipio)->with('generos',$generos)->with('listUnivesidad',$listUnivesidad)->with('id_campus',$id_campus)->with('nombre_campus',$nombre_campus)->with('id_facultad',$id_facultad)->with('nombre_facultad',$nombre_facultad)->with('id_carrera',$id_carrera)->with('nombre_carrera',$nombre_carrera)->with('dependientes',$dependientes)->with('dependiente',$dependiente)->with('padres',$padres)->with('madres',$madres)->with('idd_carrera',$idd_carrera)->with('depenID',$depenID); 

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
        
        

         $madreID=0;
        $padreID=0;
        

        if($request->nombre_madre!=null){
        /*Datos de la madre*/        
        $madre =  Datos_madre::find($request->idd_madre);       
        $madre->identidad =$request->id_madre;
        $madre->nombre_completo =$request->nombre_madre;
        $madre->celular =$request->telefono_madre;
        $madre->save();
        $madreID=$madre->id;
        }else{

        }
        
        if($request->nombre_padre!=null){
        /*Datos del padre*/
        $padre =  Datos_padre::find($request->idd_padre);        
        $padre->identidad=$request->id_padre;
        $padre->nombre_completo=$request->nombre_padre; 
        $padre->celular=$request->telefono_padre;
        $padre->save();   
        $padreID= $padre->id;
        }else{
            
        }          
        /*Datos del aspirante*/
        $aspirante =  Datos_personales::find($id);   
        $aspirante->identidad= $request->identidad;
        $aspirante->nombre= $request->nombre_completo;
        $aspirante->fecha_nacimiento= $request->fecha_nacimiento;
        $aspirante->ciudad= $request->ciudad;
        $aspirante->celular= $request->telefono_aspirante;
        $aspirante->email= $request->email;
        $aspirante->estado_civil= $request->estado_civil;
        $aspirante->id_municipio= $request->id_municipio;
        $aspirante->genero= $request->id_genero;
        $aspirante->becas_id=$request->becas_id;
        $aspirante->cuenta_universitaria=$request->cuenta_universitaria;
        $aspirante->save();
                     
     
        /*Datos de la persona dependiente*/

        $dependiente = persona_dependiente::find($request->idd_dependiente);        
        
        $dependiente->identidad =$request->id_dependiente;
        $dependiente->nombre_completo =$request->nombre_dependiente;
        $dependiente->parentesco =$request->parentesco;
        $dependiente->celular =$request->telefono_dependiente;
        $dependiente->save();
        
         /*Datos de la carrera*/
        $carrera = Datos_personales_has_carreras::find($request->idd_carrera);
        
        $carrera->carrera_id=$request->carrera_id;
        $carrera->save();

    

        return redirect()->route('aspirantes.index');



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

    /*me carga los municipios*/
    public function bydepa($id){
        return Municipios::where('id_depto',$id)->get();
    }

    /*Me carga los campus de las universidades*/
    public function bycampus($id){
        return Campus::where('universidad_id',$id)->get();
    }

    /*Me carga las facultades*/ 
    public function byfacultads($id){
        return Facultad::where('campus_id',$id)->get();
    }

    /*Me carga las carreras*/ 
    public function bycarreras($id){
        return Carreras::where('facultad_id',$id)->get();
    }

    /*Me carga los periodos */ 
    public function byperiodos($id){
        return Periodo_universidad::where('universidad_id',$id)->get();
    }

    public function preplanilla($date){
        $numMes= $date;
        $mes = substr($date, 5,2 );
        $nueva = 'G.'.$mes;
    /*--------------------------- PRIMERO SACO LOS QUE DICEN AMBOS EL PERIODO ---------------------------*/  
       $BecariosAmbos= DB::select(" 
             SELECT 
                   
                   A.periodo as periodo,                  
                   B.id_datos_personales as datos,
                   C.nombre
                FROM calendario_universidad A
                LEFT JOIN actualizacion_periodo B
                ON(A.id=B.calendario_universidad_id)
                INNER JOIN datos_personales C
                ON(B.id_datos_personales=C.id)
                LEFT JOIN retenido D
                ON(C.id=D.id_datos_personales)
                INNER JOIN calendario_universidad E
                ON(B.calendario_universidad_id= E.id)
                INNER JOIN universidad F
                ON(E.universidad_id=F.id)
                INNER JOIN pagos_meses_universidad G
                ON(G.universidad_id= F.id)
                WHERE  ('$numMes' BETWEEN A.inicio AND A.final) 
                        AND (B.promedio_global>=65 AND B.promedio_periodo>=65) 
                        AND (C.estado_estudios='Activo'  OR C.estado_practica= 'Activo')
                        AND ('$numMes' NOT BETWEEN C.retencion_inicio AND C.retencion_final)
                        AND (". $nueva ."='Ambos Periodo')                           
                            GROUP BY     
                                        A.periodo,
                                        B.id_datos_personales,
                                        C.nombre ;
                         ");

/*-----------------Cargo la variable info con el id de los que dice ambod--------------------------------*/



$data =[];    
                
 foreach ($BecariosAmbos as $becario) {
  
    $row=[];                
    if($becario->periodo=='II Periodo'){
         $row['datos']= DB::select("
                    SELECT 
                    a.id,
                    A.universidad_id, 
                    a.inicio, 
                    b.id_datos_personales
                FROM calendario_universidad A
                INNER JOIN actualizacion_periodo B
                ON(B.calendario_universidad_id=A.id)
                WHERE Date_format(A.inicio,'%Y')= YEAR(NOW()) AND A.periodo='I Periodo' AND b.id_datos_personales='$becario->datos' AND (B.promedio_global>=65 AND B.promedio_periodo>=65);
            ");
           $data[]=$row;      
    }
     $row=[];                
    if($becario->periodo=='III Periodo'){
         $row['datos']= DB::select("
                    SELECT 
                    a.id,
                    A.universidad_id, 
                    a.inicio, 
                    b.id_datos_personales
                FROM calendario_universidad A
                INNER JOIN actualizacion_periodo B
                ON(B.calendario_universidad_id=A.id)
                WHERE Date_format(A.inicio,'%Y')= YEAR(NOW()) AND A.periodo='II Periodo' AND b.id_datos_personales='$becario->datos' AND (B.promedio_global>=65 AND B.promedio_periodo>=65);
            ");
           $data[]=$row;      
    }
     $row=[];                
    if($becario->periodo=='IV Periodo'){
         $row['datos']= DB::select("
                    SELECT 
                    a.id,
                    A.universidad_id, 
                    a.inicio, 
                    b.id_datos_personales
                FROM calendario_universidad A
                INNER JOIN actualizacion_periodo B
                ON(B.calendario_universidad_id=A.id)
                WHERE Date_format(A.inicio,'%Y')= YEAR(NOW()) AND A.periodo='III Periodo' AND b.id_datos_personales='$becario->datos' AND (B.promedio_global>=65 AND B.promedio_periodo>=65);
            ");
           $data[]=$row;      
    }
   

 }

  $preplanilla= DB::select(" 
             SELECT 
                   A.universidad_id, 
                   A.periodo, 
                   A.inicio,
                   A.final,
                   B.id_datos_personales,
                   C.nombre
                FROM calendario_universidad A
                LEFT JOIN actualizacion_periodo B
                ON(A.id=B.calendario_universidad_id)
                INNER JOIN datos_personales C
                ON(B.id_datos_personales=C.id)
                LEFT JOIN retenido D
                ON(C.id=D.id_datos_personales)
                INNER JOIN calendario_universidad E
                ON(B.calendario_universidad_id= E.id)
                INNER JOIN universidad F
                ON(E.universidad_id=F.id)
                INNER JOIN pagos_meses_universidad G
                ON(G.universidad_id= F.id)
                WHERE  ('$numMes' BETWEEN A.inicio AND A.final) 
                        AND (B.promedio_global>=65 AND B.promedio_periodo>=65) 
                        AND (C.estado_estudios='Activo'  OR C.estado_practica= 'Activo')
                        AND ('$numMes' NOT BETWEEN C.retencion_inicio AND C.retencion_final)
                        AND (" . $nueva . "='Si')                           
                            GROUP BY    A.universidad_id, 
                                        A.periodo, 
                                        A.inicio,
                                        A.final,
                                        B.id_datos_personales,
                                        C.nombre ;
                         ");

$nuevo = array_merge($preplanilla, $data);

      
       return $nuevo;
        
       /*
*/
    }



}
