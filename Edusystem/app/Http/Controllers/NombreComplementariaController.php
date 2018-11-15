<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nombre_complementaria;

class NombreComplementariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$nombres = Nombre_complementaria::all();   
        return view('nombre_complementaria.index');
    }
    
     public function mostrar(){
        $nombres = Nombre_complementaria::all();   
        return view('nombre_complementaria.mostrar')->with('nombres',$nombres);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

      return view('nombre_complementaria.create');
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {          
        $nombre = new Nombre_complementaria($request->all());
        $nombre->save();
        return redirect()->route('complementaria.mostrar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($id)
    {
       $nombre = Nombre_complementaria::find($id);
       $nombre->estado ='Desactivo'; 
       $nombre->save(); 
       return redirect()->route('complementaria.mostrar');
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
