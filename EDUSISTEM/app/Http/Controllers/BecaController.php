<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Becas;
use App\Reportes\Users_has_becas;
use Carbon\Carbon;

class BecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $becas =  Becas::all();

        return view('becas.index')->with('becas',$becas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('becas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $becas = new Becas($request->all());
        $becas->save();

        /*Parte de la informacion del reporte*/
        $reporte = new users_has_becas();
        $reporte->users_id = $request->users_id;
        $reporte->tipo_accion_id = 1;
        $reporte->becas_id= $becas->id; 
        $reporte->save();
       return redirect()->route('becas.index'); 
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
        $beca = Becas::find($id);
        return view('becas.edit')->with('beca',$beca);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $carbon=Carbon::now();
        $beca =Becas::find($id);
        $beca->fill($request->all());
        $beca->save();
       
        /*Parte de la informacion del reporte*/
        $reporte = new users_has_becas();
        $reporte->users_id = $request->users_id;
        $reporte->tipo_accion_id = 2;
        $reporte->becas_id= $beca->id;
        $reporte->created_at= $carbon; 
        $reporte->save();
          return redirect()->route('becas.index');
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
