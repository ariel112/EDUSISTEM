$(document).ready(function(){



$('#alert').hide();
$('#alertw').hide();


/*Funcion para desactivar un departamento*/
$('.btn-delete').click(function(e){
	e.preventDefault();

		if(!confirm("Esta seguro que desea desactivar")){

			return false;
		}

		var row = $(this).parents('tr');
		var form = $(this).parents('form');
		var url = form.attr('action');

		$('#alertw').fadeIn().delay(300).fadeOut();

		$.post(url, form.serialize(), function(result){
			row.fadeOut();
			$('#alertw').html(result.message);
		}).fail(function(){
			$('#alert').html('Algo va mal');
		});

    });

/*-------------------------------------------------------------------------------------------------------------------------------------------------*

/*codigo para agregarle los departamentos a los usuarios*/
 $('#btnEmpty1').click(function(e){
    e.preventDefault();

    var form = $('#formEmpty1');
    var url = form.attr('action');
    var tbody = $('#tbody');
    
    var departamento = $('#depa option:selected').html() ; 
  
     

    var fecha = new Date();
    var y = fecha.getFullYear();
    var me = fecha.getMonth();
    var d = fecha.getDate();
    var h = fecha.getHours();
    var mi = fecha.getMinutes();
    var s = fecha.getSeconds();
    var mil = fecha.getMilliseconds();

    var date = y+'-'+me+'-'+d+' '+h+':'+mi+':'+s+':'+mi;
    
    
    $.post(url, form.serialize(), function(result){
      $('#mydepa').hide();	
      $('.modal-backdrop').remove();
      tbody.append(`
			<tr>
      		<td>${departamento}</td>
				<td>${date}</td>
				      <td>
						<form method="POST" action="#" accept-charset="UTF-8"><input name="_token" type="hidden" value="1">
							<a href="#" class="btn btn-danger btn-delete">Desactivar</a>
						</form> 
				      	
			 </td>
			<tr>
      	`);
      $('#alert').html(result.message);
      $('#alert').fadeIn().delay(1000).fadeOut();
	  
    });

 });



/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*codigo para agregarle el puesto a los usuarios*/

$('#btnEmpty12').click(function(e){
	e.preventDefault();

	var form1 = $('#form');
	var url = form1.attr('action');

	/*informacion del elemento que se seleciono del cargo*/
	var seleccion = $('#carg option:selected').html() ;
	
   
   $.post(url,form1.serialize(), function(result){
   	 $('#myCasa').hide();   	 
     $('.modal-backdrop').remove();	
   	 $('#alert').fadeIn().delay(1000).fadeOut();
   	 $('#alert').html(result.message);
   	 $('#cargo').html(seleccion);
   
   });
	


});




/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*codigo para validar el formulario de creacion de becario*/

$('#parentesco').click(function () {
	var $parentesco = $('#parentesco').val();

   
   if ($parentesco=='Padre') {
   	$('#padre').fadeOut('slow');
   	$('#madre').fadeIn('slow');	
   }
   if($parentesco=='Madre'){
   	$('#madre').fadeOut('slow');
   	$('#padre').fadeIn('slow');
   }
   if($parentesco!='Padre' && $parentesco!='Madre'){
   		$('#padre').fadeIn('slow');
   		$('#madre').fadeIn('slow');	
   }
   


});

/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/


/*codigo para validar la dependencia de los municipios*/

$('#departamentos').change(function(event) {
   var id = event.target.value;
   onselector(id); 
});

/*codigo para ver las campus*/
$('#universidad').change(function(event) {
   var id = event.target.value;
   oncampus(id); 
});


/*codigo para ver las facultades*/
$('#campus').change(function(event) {
   var id = event.target.value;
   onfacultad(id); 
});

/*codigo para ver las carreras*/
$('#facultad').change(function(event) {
   var id = event.target.value;
   oncarreras(id); 
});

/*codigo para ver los periodos por universidad*/
$('#universidad').change(function(event) {
   var id = event.target.value;
   onperiodo(id); 
});



});

/*termina el document ready*/


/*busca el municipio asociado con el departamento*/
function onselector(id){ 
 
 if(!id){
  $('#muncipio').attr('disabled', 'disabled');
 }
  //AJAX
  $.get('/api/proyecto/'+id+'/niveles', function(data){
    var html_select =' <option selected disabled >Seleccione un municipio </option>';
    for (var i=0; i<data.length; ++i)
      html_select += '<option value="'+data[i].id_municipio+'">'+data[i].municipio +'</option>'
     
      $('#municipio').html(html_select);
  });


}



/*busca el ccampus asociado con la universidad*/
function oncampus(id){ 
 
 
 if(!id){

 }
  //AJAX
  $.get('/api/campus/'+id+'/universidades', function(data){
    var html_select1 =' <option selected disabled >Seleccione un campus </option>';
    for (var i=0; i<data.length; ++i)
      html_select1 += '<option value="'+data[i].id+'">'+data[i].nombre +'</option>'
     
      $('#campus').html(html_select1);
  });


}



/*busca la facultad asociada con el campus*/
function onfacultad(id){ 

 
 if(!id){

 }
  //AJAX
  $.get('/api/facultads/'+id+'/campus', function(data){
    var html_select1 =' <option selected disabled >Seleccione la facultad </option>';
    for (var i=0; i<data.length; ++i)
      html_select1 += '<option value="'+data[i].id+'">'+data[i].nombre +'</option>'
     
      $('#facultad').html(html_select1);
  });


}


/*busca las carreras asociadas ala facultad*/
function oncarreras(id){ 

 
 if(!id){

 }
  //AJAX
  $.get('/api/carreras/'+id+'/facultads', function(data){
    var html_select1 =' <option selected disabled >Seleccione la carrera </option>';
    for (var i=0; i<data.length; ++i)
      html_select1 += '<option value="'+data[i].id+'">'+data[i].nombre +'</option>'
     
      $('#carrera').html(html_select1);
  });


}

/*busca las carreras asociadas ala facultad*/
function onperiodo(id){ 

 
 if(!id){

 } 
  //AJAX
  $.get('/api/periodos/'+id+'/university', function(data){
    var html_select1 =' <option selected disabled >Seleccione un periodo </option>';
    for (var i=0; i<data.length; ++i)
      html_select1 += '<option value="'+data[i].nombre+'">'+data[i].nombre +'</option>'
     
      $('#periodo').html(html_select1);
  });


}
