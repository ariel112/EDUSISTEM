@extends('sidebar.sidebar')

@section('content')

<table id="example" class="ui unstackable unsortable celled center aligned small table tableNoOrdenable" >
  <thead>
      <tr id="letra-th">
          <th>Perfil</th>
          <th>Nombre Completo</th>
          <th>Cargo</th>
          <th>Identidad</th>
          <th>Universidad</th>

      </tr>
   
  </thead>
  <tbody>
    <tr >      
    
	  <td><a href="{{route('aspirantes.perfil',1)}}"><i class="fas fa-user-tie 8x" ></i></a></td>
      <td>Nombre del becario..</td>
      <td >Cargo del becario..</td>
      <td >0000-0000-0000</td>
      <td >Nombre de la Universidad</td>
      
    </tr>
   
   
  </tbody>
</table>
@endsection