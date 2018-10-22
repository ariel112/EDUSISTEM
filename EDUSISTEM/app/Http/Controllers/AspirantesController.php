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


class AspirantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('aspirantes/index');
    }



     public function perfil($id)
    {
        return view('aspirantes/perfil');
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
      
        return view('aspirantes/create')->with('departamentos',$departamentos)->with('universidades',$universidades);   
         }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
/*
    public function getMunicipios(Request $request, $id){
        

        if($request->ajax()){
            $municipios = Municipios::municipios($id);
            return Response()->json($municipios);
        }
        
    }

    */
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



}
