<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Universidad;
use App\Pagos_meses_universidad;
use DB;
class PagoMesesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $universidades = Universidad::all();
        return view('pagos_meses_universidad/index')->with('universidades',$universidades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*utilizo la ruta create para mostrar la informacion general de la universidades*/
    public function create()
    { 
      $general = DB::select("
                    SELECT 
                       A.id as id,
                       B.nombre as universidad,
                       B.abreviatura as abreviatura,
                       A.enero as enero, 
                       A.febrero as febrero,
                       A.marzo as marzo,
                       A.abril as abril,
                       A.mayo as mayo,
                       A.junio as junio,
                       A.julio as julio,
                       A.agosto as agosto,
                       A.septiembre as septiembre,
                       A.octubre as octubre,
                       A.noviembre as noviembre,
                       A.diciembre as diciembre
                      FROM pagos_meses_universidad A
                      INNER JOIN universidad B
                      ON(A.universidad_id=B.id)
                      WHERE  Date_format(A.created_at,'%Y')= YEAR(NOW())

         ");


      return view('pagos_meses_universidad/general')->with('general',$general);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $pagos_meses_universidad= new Pagos_meses_universidad($request->all());
        $pagos_meses_universidad->save();
        return redirect()->route('meses.perfil',$request->universidad_id);  

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $universidad = Universidad::find($id);
       return view('pagos_meses_universidad/create')->with('universidad',$universidad);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $pago = Pagos_meses_universidad::find($id);
       return view('pagos_meses_universidad/edit')->with('pago',$pago);
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
        
        $mes =Pagos_meses_universidad::find($id);
        $mes->fill($request->all());
         $mes->save();

         return redirect()->route('meses.perfil',$mes->id);

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

    public function perfil($id){
        $pagos = DB::select(" 
            SELECT id,enero, febrero,marzo,abril,mayo,junio,julio,agosto,septiembre,octubre,noviembre,diciembre
                FROM pagos_meses_universidad
                WHERE universidad_id='$id';

         ");
        $universidad = Universidad::find($id);
        return view('pagos_meses_universidad/perfil')->with('universidad',$universidad)->with('pagos',$pagos);

    }
}
