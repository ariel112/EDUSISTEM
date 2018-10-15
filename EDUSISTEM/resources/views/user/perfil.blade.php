@extends('sidebar.sidebar')

@section("content")
<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
	<div class="ui segment">
				<div class="ui grid">
				<div class="ui teal huge ribbon label">
        			<i class="user icon"></i> Informacion de Usuario
     			 </div>
				</div>
     			 <div class="ui center aligned grid">
					    <a id="posicion-a" href="#" class="image">
					    	
					    	@if($user->imagen==null)
		                       <img id="imagen-perfil" src="{{ asset('img/user.png') }}"  alt="Taller" class="img-responsive img-rounded"/>
		                     @else
		                     <img id="imagen-perfil" src="/images/perfiles/{{$user->imagen}}"  alt="Taller" class="img-responsive img-rounded"/>		                        
		                     @endif   
					    </a>     			 	
     			 </div>
     			 <div class="ui grid">
     			 <div class="ui horizontal divider">
     			 	<div class="ui  huge label">{{ $user->name }}</div>    			 
  				</div>
  				</div>
  				<div class="ui grid">
     			 <div class="ui horizontal divider">
     			 	<div id="boton-modal" >	                       
						    <div  id="consultora2" >
						    	<a data-toggle="modal" data-target="#myCasa" >
		                        	<font  size="3" face="arial" >
		                        		<button id="boton-letra" class="btn btn-info"><i class="icon plus"></i>Agregar Cargo </button>
		                        	</font>
		                        </a>
		                    </div>		                        
					    </div>	    			 
  				</div>
  				</div>
  				<div class="ui stackable three column center aligned grid"> 				
				<div class="column">
					<h2 class="ui  icon header" >
  					<i class="circular teal users icon"></i>
 	 				Tipo de Usuario: <p id="cargo">{{ $user->type }}</p>
					</h2>
				</div>
				<div class="column">
					<h2 class="ui  icon header">
  					<i class="circular teal envelope icon"></i>
 	 				Correo: {{ $user->email }}
					</h2>
				</div>				
				</div>
	</div>
					
	<div  id="consultora22" >
		<a data-toggle="modal" data-target="#mydepa" >
	       	<font  size="3" face="arial" >
	        	<button id="boton-letra" class="btn btn-info"><i class="icon plus"></i>Asignar departamentos</button>
	       	</font>
	    </a>
	</div> 

		 		
	
	<div id="alertw" class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
	  
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<div id="alert" class="alert alert-success alert-dismissible fade show mt-3" role="alert">
	  
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<table class="ui blue table">
	  <thead>
	    <tr><th>Departamento</th>
	    <th>Fecha de Asignado</th>
	     <th>Accion</th>
	    
	  </tr></thead>
	  <tbody id="tbody">
	    @foreach($depas as $depa)    
	    
	    <tr >
	      <td>{{$depa->name}}</td>
	      <td>{{$depa->fecha}}</td>
	      <td>
			{!! Form::open(['route'=>['editar-estado', $depa->id], 'method' => 'POST']) !!}
				<a href="#" class="btn btn-danger btn-delete">Desactivar</a>
			{!! Form::close() !!}
	      	
	       </td>
	    
	    </tr>
	    
	    @endforeach
	  </tbody>
	</table>


    <!--Ventana modal de la casa asignado -->
	<div id="mydepa" class="modal fade" role="dialog">
	  <div  class="modal-dialog">
	    <!-- Modal content-->
	    <div  class="modal-content">
	      <div class="modal-header">
	         
	        <h4 class="modal-title" align="center" " ><b>Asignar Departamento</b></h4>
	      </div>
	      <div class="modal-body">
					<div>
						  {!! Form::open(['route' => ['depa-agregar',$user->id], 'method'=>'PUT', 'files'=>true, 'id'=>'formEmpty1','data-smk-icon'=>'glyphicon-remove-sign']) !!}					   
						   <div class="form-group" >	   
						   		{!! Form::label('name','Nombre:' ) !!}
						   		{{$user->name}}						   		   	    
						   </div>
						    <div class="form-group" style="width: 209px;"  >    
					       {!! Form::label('Departamento','Departamento:',['class'=>'control-label']) !!}
					   		<div style="width: 195px;">								
					   			<select name="departamento_id_depto" id="depa">
								 @foreach($depars as $depar)
								  <option value="{{$depar->id_depto}}">{{$depar->departamento}}</option> 
								 @endforeach		  
								</select>				   		  	
					   		</div>
					   	</div>
					</div>

	      </div>
	      <div class="modal-footer">						      	
	        <div align="center">
				{!! Form::submit('Registrar',['class'=>'btn btn-success ','id'=>'btnEmpty1' ]) !!}
				{!! Form::close()!!}
				</div>						      
	      </div>
	    </div>
	  </div>
	</div>




    <!--Ventana modal de la casa asignado -->
	<div id="myCasa" class="modal fade" role="dialog">
	  <div  class="modal-dialog">
	    <!-- Modal content-->
	    <div  class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title" align="center" " ><b>Asignar cargo</b></h4>
	      </div>						   
	      <div class="modal-body">
					<div>
						 {!! Form::open(['route' => ['agregar-estado',$user->id], 'method'=>'PUT', 'files'=>true, 'id'=>'form','data-smk-icon'=>'glyphicon-remove-sign']) !!}	   
						   <div class="form-group" >	   
						   		{!! Form::label('name','Nombre:' ) !!}
						   		{{$user->name}}											   		   	
						   </div>
						    <div class="form-group" style="width: 209px;"  >    
					       {!! Form::label('Cargo','Cargo:',['class'=>'control-label']) !!}
					   		<div style="width: 195px;">
					   		  {!! Form::select('type',
					   		  [
					   		  'Gerencia de Formacion y Capacitacion'=> 'Formacion Y Capacitacion',
					   		  'Gerencia de Compromiso Social y Juvenil'=>'Compromiso Social y Juvenil',
					   		  'Gerencia de Monitoreo y Evaluacion'=>'Gerencia de Monitoreo y Evaluacion',
					   		  'Gerencia de Formacion y Liderazgo'=>'Gerencia de Formacion y Liderazgo',
					   		  'Gerencia Contabilidad'=>'Gerencia Contabilidad',
					   		  'Gerencia Planilla'=>'Gerencia Planilla',
					   		  'Operaciones'=>'Operaciones',
					   		  'Administrador'=>'Administrador'
					   		  ]
					   		    ,$user->type,
					   		  ['class'=>'form-control', 'required','placeholder'=>'Seleccione un Cargo', 'id'=>'carg'])!!}
					   		</div>
					   	</div>
					</div>

	      </div>
	      <div class="modal-footer">						      	
	        <div align="center">
				{!! Form::submit('Registrar',['class'=>'btn btn-success ','id'=>'btnEmpty12' ]) !!}
				{!! Form::close() !!}
				</div>						      
	      </div>
	    </div>
	  </div>
	</div>


@section('script')
 <!--Este script es para las peticiones con ajax -->
 <script src="{{ asset('js/script.js')}}"></script>    
@endsection

 

@endsection