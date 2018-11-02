<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Digitalizacion_documentos;

class ExpedientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

              

                $expediente= new Digitalizacion_documentos();
                
                
                if($request->file('expediente')) { 
                $file=$request->file('expediente');
                $name='Expediente_'.$request->identidad.'_'.time().'.'.$file->getClientOriginalExtension();
                $path = public_path().'/documentos/expediente/';
                $file->move($path,$name);
                                              }
                 $expediente->url=$name;
                 $expediente->datos_personales_id=$request->datos_personales_id;
                 $expediente->anio=$request->anio;
                 $expediente->periodo=$request->periodo;
                
                 
                 $expediente->save();                             
                return redirect()->route('aspirantes.perfil',$request->datos_personales_id);

        
    }

    public function ficha01(Request $request){
        dd($request);
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


