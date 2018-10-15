@extends('sidebar.sidebar')

@section("content")

<table id="example" class="ui unstackable unsortable celled center aligned small table tableNoOrdenable" >
        <thead>
            <tr>
            	<th>Empleado</th>
                <th>Cargo</th>
                <th>Fecha de acceso al sistema</th>          
              
            </tr>
        </thead>
        <tbody>
    @foreach ($sesiones as $sesion)      	
            <tr>

            	<th class="text-capitalize">
            		{{$sesion->name}}	
            	</th>
                <td>{{$sesion->type}}</td>
                <td>{{$sesion->fecha}}</td>         
              
            </tr>          
    @endforeach      
        </tbody>
        <tfoot>
            <tr>
            	<th>Empleado</th>
                <th>Cargo</th>
                <th>Fecha de acceso al sistema</th>   
            </tr>
        </tfoot>
    </table>



@endsection