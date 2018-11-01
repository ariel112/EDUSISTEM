<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Universidad;
use App\Calendario_universidad;
use DB;

class CalendarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $universidades = Universidad::all();
       
        return view('calendario_academico.index')->with('universidades',$universidades);   
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

        $calendario = new Calendario_universidad($request->all());
        $calendario->save();        
       return redirect()->route('calendario.academico');        

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
    {   $universidades = Universidad::all();
        $calendario = Calendario_universidad::find($id);
        $calendario2 = DB::select("
                SELECT A.id as id, A.periodo, A.inicio AS inicio, A.final as final, b.nombre as nombre
                    FROM calendario_universidad A 
                    INNER JOIN universidad B 
                    ON(A.universidad_id=B.id)
                    WHERE a.id ='$id';
                
                 ");

    

     return view('calendario_academico.edit')->with('universidades',$universidades)->with('calendario',$calendario)->with('calendario2',$calendario2);
        
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
       
        $calendario =Calendario_universidad::find($id);
        $calendario->fill($request->all());
        $calendario->save();

        return redirect()->route('universidad.perfil',$request->universidad_id);
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


    public function calendario(){
        $universidades = Universidad::all();
      return view('calendario_academico.calendario')->with('universidades',$universidades);
    }

    public function perfil($id){

        $universidad = Universidad::find($id);
        $periodos = DB::select("
                SELECT A.descripcion as observacion, 
                       A.id as id, 
                       A.periodo as periodo, 
                       A.inicio as inicio, 
                       A.final as final, 
                       A.solicitud_convenio as solicitud 
                    FROM calendario_universidad A
                    WHERE A.universidad_id ='$id'
         ");
        return view('calendario_academico.perfil')->with('universidad',$universidad)->with('periodos',$periodos);
    }

}
