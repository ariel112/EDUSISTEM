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
   	 $('#myCasa').modal('dispose');
   	 $('body').removeClass('modal-open');
     $('.modal-backdrop').remove();
	
   	 $('#alert').fadeIn().delay(1000).fadeOut();
   	 $('#alert').html(result.message);
   	 $('#cargo').html(seleccion);
   
   });
	


});





});