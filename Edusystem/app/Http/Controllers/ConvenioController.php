<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Universidad;
use DB;
class ConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $universidades = Universidad::all();
        return view('convenio/create')->with('universidades',$universidades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

     public function bitacora(){
           $acciones = DB::select("
              SELECT B.name AS nombre, B.type as type, B.email as email,A.created_at as fecha, C.nombre as accion,E.nombre AS beca, D.color AS color
                FROM users_has_becas A
                INNER JOIN users B
                ON(A.users_id=B.id)
                INNER JOIN tipo_accion c
                on(A.tipo_accion_id=C.id)
                INNER JOIN color D 
                ON(C.color_id=D.id)
                INNER JOIN becas E
                ON(A.becas_id=E.id)   ;          
             ");
           return view("user/bitacora")->with('acciones',$acciones);
    }
}
