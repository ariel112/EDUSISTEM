@extends('sidebar.sidebar')

@section('content')




<!-- Header -->							

<div>
	<div  class="row">
		<div class="col-md-5">
		 <div class="estudiante">
		   <div align="center" class="titulo-document">INFORMACION DEL (LA) ESTUDIANTE</div>	
			<div class="form-group row">
      		<label for="inputEmail3" class=" col-form-label">Nombre Completo: </label>     
		    <input type="text" class="form-control" placeholder="Nombre....">
		 
			
      		<label for="inputEmail3" class=" col-form-label">No. Identidad: </label>     
		    <input type="text" class="form-control" placeholder="Identidad....">
		  
	
      		<label for="inputEmail3" class=" col-form-label">Correo Electronico: </label>     
		    <input type="email" class="form-control" placeholder="Correo....">
		   	
		   	 <div class="col-4  mt-3">
		      <label class="sr-only" for="inlineFormInputGroupUsername">Celular:</label>
		      <div class="input-group">
		        <div class="input-group-prepend">
		          <div class="input-group-text"><i class="icon mobile alternate large blue"></i></div>
		        </div>
		        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Celular...">
		      </div>
		    </div>

		    <div class="col-4  mt-3">
		      <label class="sr-only" for="inlineFormInputGroupUsername">Whatsapp:</label>
		      <div class="input-group">
		        <div class="input-group-prepend">
		          <div class="input-group-text"><i class="icon whatsapp large green"></i></div>
		        </div>
		        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="whatsapp...">
		      </div>
		    </div>  

		    <div class="col-4  mt-3">
		      <label class="sr-only" for="inlineFormInputGroupUsername">Telefono fijo:</label>
		      <div class="input-group">
		        <div class="input-group-prepend">
		          <div class="input-group-text"><i class="icon phone large violet"></i></div>
		        </div>
		        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Telefono fijo...">
		      </div>
		    </div> 
			
      		<label for="inputEmail3" class=" col-form-label">Direccion de casa: </label>     
		    <textarea class="form-control" placeholder="Direccion..."></textarea>

		    <select class="custom-select mt-3">
			  <option selected>Seleccion el departamento:</option>
			  <option value="1">One</option>
			  <option value="2">Two</option>
			  <option value="3">Three</option>
			</select>

			<select class="custom-select mt-3">
			  <option selected>Seleccione el Municipio:</option>
			  <option value="1">One</option>
			  <option value="2">Two</option>
			  <option value="3">Three</option>
			</select>
		    </div>
		  </div>  			
		</div>

		<!--informacion del la universidad --->
		<div class="col-md-5">
		 <div class="estudiante">
		   <div align="center" class="titulo-document">Centro Universitario</div>	
			<div class="form-group row">
      		<label for="inputEmail3" class=" col-form-label">Nombre del centro universitario: </label>     
		    <input type="text" class="form-control" placeholder="Nombre....">
		 
			
      		<label for="inputEmail3" class=" col-form-label">Departamento: </label>     
		    <input type="text" class="form-control" placeholder="Identidad....">
		  
	
      		<label for="inputEmail3" class=" col-form-label">Carrera: </label>     
		    <input type="text" class="form-control" placeholder="Correo....">

		     <select class="custom-select mt-3">
			  <option selected>Seleccion el tipo de periodo:</option>
			  <option value="1">Semestrales</option>
			  <option value="2">Trimestrales</option>
		
			</select>
		   	
		   	<label for="inputEmail3" class=" col-form-label">Cuenta: </label>     
		    <input type="text" class="form-control" placeholder="Correo....">  			
      	
		    	     
			  
					</div>							
			</div>	

			</div>






		<!--informacion de los datos personales y parentesco --->
		<div class="col-md-5">
		 <div class="estudiante">
		   <div align="center" class="titulo-document">INFORMACION DE LOS DATOS PERSONALES Y PARENTESCOS</div>	
			<div class="form-group row">
      		<label for="inputEmail3" class=" col-form-label">Nombre del centro universitario: </label>     
		    <input type="text" class="form-control" placeholder="Nombre....">
		 
			
      		<label for="inputEmail3" class=" col-form-label">Departamento: </label>     
		    <input type="text" class="form-control" placeholder="Identidad....">
		  
	
      		<label for="inputEmail3" class=" col-form-label">Carrera: </label>     
		    <input type="text" class="form-control" placeholder="Correo....">

		     <select class="custom-select mt-3">
			  <option selected>Seleccion el tipo de periodo:</option>
			  <option value="1">Semestrales</option>
			  <option value="2">Trimestrales</option>
		
			</select>
		   	
		   	<label for="inputEmail3" class=" col-form-label">Cuenta: </label>     
		    <input type="text" class="form-control" placeholder="Correo....">       			  
			</div>					
		</div>		








</div>
</div>

 







@endsection