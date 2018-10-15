@extends('sidebar.sidebar')

@section("content")



<table id="example" class="ui celled table" style="width:100%">
        <thead>
            <tr>
            	<th>Imagen</th>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Correo</th>
              
                <th>Fecha de Creacion</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($users as $user)      	
            <tr>

            	<th class="center">
            		<a href="{{route('user.perfil', $user->id)}}">
            			<img class="center-imagen" src="{{asset('img/user.png')}}">
            		</a>	
            	</th>
                <td>{{$user->name}}</td>
                <td>{{$user->type}}</td>
                <td>{{$user->email}}</td>
                
                <td>{{$user->created_at}}</td>
                <td>$320,800</td>
            </tr>

           
    @endforeach      
        </tbody>
        <tfoot>
            <tr>
            	<th>Imagen</th>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
               
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>











@endsection


