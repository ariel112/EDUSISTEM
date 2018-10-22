<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perfil_usuario/index');
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


    public function foto(){
    return view('perfil_usuario.tomar_foto');  
    }


    /*toma foto del usuario*/                                          
    public function tomarfoto(Request $request){
          $usuario = User::find($request->id_usuario);

                /*mando la imagen para que la toma desde el celular*/
                if($request->file('image')) { 
                $file=$request->file('image');
                $name='Foto_perfilCel_'.time().'.'.$file->getClientOriginalExtension();
                $path = public_path().'/images/perfiles/';
                $file->move($path,$name);               
                $usuario->img_url=$name;  

                                              }

                else{ 
                /*mando la imagen para que la tome desde la pc*/
                $base_to_php =explode(',',$request->base64);
                $name='Foto_Perfil_'.time().'.jpg';
                $data= base64_decode($base_to_php[1]);
                $path = public_path().'/images/perfiles/'.$name;                             
                file_put_contents($path,$data);                     
                $usuario->img_url=$name;
                
                }                             
              
               $usuario->save();
                
    return redirect()->route('usuario.index');

    }    


  
}
