<?php
use App\Invoice;

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Collection as Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class PrePlanillaExport implements FromCollection, ShouldAutoSize, WithHeadings, withEvents
{
       /**
     * @return array
     */
       public function registerEvents(): array
    {
        
             $styleArray = [
                'font' => [
                    'bold'=>true,
                    'size'=>12,
                    ],
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => '0000000'],
                        ],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                        'rotation' => 90,
                        'startColor' => [
                            'argb' => '2884bd',
                        ],             
                        'endColor' => [
                            'argb' => '2884bd',
                        ],
                    ],

             ];

        return [ 
            AfterSheet::class => function(AfterSheet $event) use ($styleArray) {
                $event->sheet->getStyle('A1')->applyFromArray($styleArray);
                $event->sheet->getStyle('B1')->applyFromArray($styleArray);
                $event->sheet->getStyle('C1')->applyFromArray($styleArray);
                $event->sheet->getStyle('D1')->applyFromArray($styleArray);
                $event->sheet->getStyle('E1')->applyFromArray($styleArray);
                $event->sheet->getStyle('F1')->applyFromArray($styleArray);
              
            },
        ];        

    }



    use Exportable;
     /**
    * @return \Illuminate\Support\Collection
    */
      public function __construct($date)
    {
        $this->date = $date;
    }



     public function collection()
    {       
        $fecha = Carbon::parse($this->date);
        $mfecha = $fecha->format("m");
        $yfecha =  $fecha->format("Y");
      
        
        /*condicion para sacar el mes en espanol*/
         if($mfecha==01)    
            $mesP='Enero';
         if($mfecha==02)    
            $mesP='Febrero';
         if($mfecha==03)    
            $mesP='Marzo';
         if($mfecha==04)    
            $mesP='Abril';
         if($mfecha==05)    
            $mesP='Mayo';
         if($mfecha==06)    
            $mesP='Junio';
         if($mfecha==07)    
            $mesP='Julio';
         if($mfecha==8)    
            $mesP='Agosto';
         if($mfecha==9)    
            $mesP='Septiembre';
         if($mfecha==10)    
            $mesP='Octubre';
         if($mfecha==11)    
            $mesP='Noviembre';
         if($mfecha==12)    
            $mesP='Diciembre';
          


        


   
       $numMes= $this->date;
        $mes = substr($this->date, 5,2 );
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
                        AND (C.estado_estudios='Activo')
                        AND ('$numMes' NOT BETWEEN C.retencion_inicio AND C.retencion_final)
                        AND (". $nueva ."='Ambos Periodo')                           
                            GROUP BY     
                                        A.periodo,
                                        B.id_datos_personales,
                                        C.nombre ;
                         ");

/*-----------------Cargo la variable info con el id de los que dice ambod--------------------------------*/


$data=[];   
                
 foreach ($BecariosAmbos as $becario) {
  
                   
    if($becario->periodo=='II Periodo'){
         $row= DB::select("
                   
                
                SELECT 
                    a.id,
                    A.universidad_id, 
                    a.inicio, 
                    b.id_datos_personales,
                    C.nombre,
                    C.celular,
                    C.identidad,
                    C.genero,
                    J.nombre as universidad,
                    J.abreviatura,
                    I.departamento
                    
                FROM calendario_universidad A
                INNER JOIN actualizacion_periodo B
                ON(B.calendario_universidad_id=A.id)
                
                INNER JOIN  datos_personales C
                ON(B.id_datos_personales=C.id)
                INNER JOIN datos_personales_has_carreras D
                ON(C.id=D.id_datos_personales)
                INNER JOIN carreras E
                ON(D.carrera_id=E.id)
                INNER JOIN facultad F
                ON(E.facultad_id=F.id)
                INNER JOIN campus G
                ON(F.campus_id=G.id)
                INNER JOIN municipio H
                ON(G.id_municipio=H.id_municipio)
                INNER JOIN departamento I
                ON(H.id_depto=I.id_depto)
                INNER JOIN universidad J
                ON(G.universidad_id=J.id)
                
                WHERE Date_format(A.inicio,'%Y')= '$yfecha' AND A.periodo='I Periodo' AND b.id_datos_personales='$becario->datos' AND (B.promedio_global>=65 AND B.promedio_periodo>=65);




            ");
           $data[]=$row;      
    }               
    if($becario->periodo=='III Periodo'){
         $row= DB::select("
                   
                SELECT 
                    a.id,
                    A.universidad_id, 
                    a.inicio, 
                    b.id_datos_personales,
                    C.nombre,
                    C.celular,
                    C.identidad,
                    C.genero,
                    J.nombre as universidad,
                    J.abreviatura,
                    I.departamento
                    
                FROM calendario_universidad A
                INNER JOIN actualizacion_periodo B
                ON(B.calendario_universidad_id=A.id)
                
                INNER JOIN  datos_personales C
                ON(B.id_datos_personales=C.id)
                INNER JOIN datos_personales_has_carreras D
                ON(C.id=D.id_datos_personales)
                INNER JOIN carreras E
                ON(D.carrera_id=E.id)
                INNER JOIN facultad F
                ON(E.facultad_id=F.id)
                INNER JOIN campus G
                ON(F.campus_id=G.id)
                INNER JOIN municipio H
                ON(G.id_municipio=H.id_municipio)
                INNER JOIN departamento I
                ON(H.id_depto=I.id_depto)
                INNER JOIN universidad J
                ON(G.universidad_id=J.id)
                
                WHERE Date_format(A.inicio,'%Y')= '$yfecha' AND A.periodo='II Periodo' AND b.id_datos_personales='$becario->datos' AND (B.promedio_global>=65 AND B.promedio_periodo>=65);

            ");
           $data[]=$row;      
    }
     $row=[];                
    if($becario->periodo=='IV Periodo'){
         $row= DB::select("
                    
                SELECT 
                    a.id,
                    A.universidad_id, 
                    a.inicio, 
                    b.id_datos_personales,
                    C.nombre,
                    C.celular,
                    C.identidad,
                    C.genero,
                    J.nombre as universidad,
                    J.abreviatura,
                    I.departamento
                    
                FROM calendario_universidad A
                INNER JOIN actualizacion_periodo B
                ON(B.calendario_universidad_id=A.id)
                
                INNER JOIN  datos_personales C
                ON(B.id_datos_personales=C.id)
                INNER JOIN datos_personales_has_carreras D
                ON(C.id=D.id_datos_personales)
                INNER JOIN carreras E
                ON(D.carrera_id=E.id)
                INNER JOIN facultad F
                ON(E.facultad_id=F.id)
                INNER JOIN campus G
                ON(F.campus_id=G.id)
                INNER JOIN municipio H
                ON(G.id_municipio=H.id_municipio)
                INNER JOIN departamento I
                ON(H.id_depto=I.id_depto)
                INNER JOIN universidad J
                ON(G.universidad_id=J.id)
                
                WHERE Date_format(A.inicio,'%Y')= '$yfecha' AND A.periodo='III Periodo' AND b.id_datos_personales='$becario->datos' AND (B.promedio_global>=65 AND B.promedio_periodo>=65);

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
                   C.nombre,
                   M.departamento,
                   C.identidad,
                   C.genero,
                   F.nombre as universidad,
                   C.celular,
                   F.abreviatura
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

                 INNER JOIN datos_personales_has_carreras H
                ON(C.id=H.id_datos_personales)
                INNER JOIN carreras I
                ON(H.carrera_id=I.id)
                INNER JOIN facultad J
                ON(I.facultad_id=J.id)
                INNER JOIN campus K
                ON(J.campus_id=K.id)
                INNER JOIN municipio L
                ON(K.id_municipio=L.id_municipio)
                INNER JOIN departamento M
                ON(L.id_depto=M.id_depto)

                WHERE  ('$numMes' BETWEEN A.inicio AND A.final) 
                        AND (B.promedio_global>=65 AND B.promedio_periodo>=65) 
                        AND (C.estado_estudios='Activo' )
                        AND ('$numMes' NOT BETWEEN C.retencion_inicio AND C.retencion_final)
                        AND (" . $nueva . "='Si')                           
                            GROUP BY    A.universidad_id, 
                                        A.periodo, 
                                        A.inicio,
                                        A.final,
                                        B.id_datos_personales,
                                        C.nombre,
                                        M.departamento,
                                        C.identidad,
                                        C.genero,
                                        F.nombre ,
                                        C.celular,
                                        F.abreviatura ;     
                                         ");
$info = array();
foreach ($data as $key => $value) {
    foreach ($value as $key2 => $dato) {
        $info= array_prepend($info,$dato);
    }
}


/*Voy a buscar todos los que estan en practica*/
$practica= DB::select(" 
             SELECT 
                   A.universidad_id, 
                   A.periodo, 
                   A.inicio,
                   A.final,
                   B.id_datos_personales,
                   C.nombre,
                   M.departamento,
                   C.identidad,
                   C.genero,
                   F.nombre as universidad,
                   C.celular,
                   F.abreviatura
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

                 INNER JOIN datos_personales_has_carreras H
                ON(C.id=H.id_datos_personales)
                INNER JOIN carreras I
                ON(H.carrera_id=I.id)
                INNER JOIN facultad J
                ON(I.facultad_id=J.id)
                INNER JOIN campus K
                ON(J.campus_id=K.id)
                INNER JOIN municipio L
                ON(K.id_municipio=L.id_municipio)
                INNER JOIN departamento M
                ON(L.id_depto=M.id_depto)

                WHERE    C.estado_practica= 'Activo'
                                                 
                            GROUP BY    A.universidad_id, 
                                        A.periodo, 
                                        A.inicio,
                                        A.final,
                                        B.id_datos_personales,
                                        C.nombre,
                                        M.departamento,
                                        C.identidad,
                                        C.genero,
                                        F.nombre ,
                                        C.celular,
                                        F.abreviatura ;     
                                         ");

    $nuevo = array_merge($preplanilla, $info, $practica);





    

    $data2 =[];
                 foreach ($nuevo as $datos){
                    $row=[];
                    $row['Nombre Completo']=$datos->nombre;
                    $row['Identidad']=$datos->identidad;
                    $row['Celular']=$datos->celular;
                    $row['Universidad']=$datos->universidad;
                    $row['Departamento']=$datos->departamento;
                    $row['Mes']=$mesP;
                    $data2[]=$row;
                    } 





$collection = Collection::make($data2);

        return collect($data2);
    }

     public function headings(): array
    {
        return [
            'Nombre Completo',
            'Identidad',
            'Celular',
            'Universidad',
            'Departamento',
            'Mes'
        ];
    }


}
