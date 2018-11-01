@extends('sidebar.sidebar')


@section("content")


<div class="right_col" role="main">

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Perfil Universidad</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                
                  	<div align="center">
                  		<h2>{{$universidad->nombre}}</h2>
                 		<h4>{{$universidad->abreviatura}}</h4>
                 		<img class="center-imagen" width="100" height="100" src="/logo-universidades/{{$universidad->url_imagen}}">
                  	</div>
				<br>
				<br>
               <div  class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Convenios <small>{{$universidad->abreviatura}} </small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Periodo</th>
                          <th>Observación</th>
                          <th>Inicio</th>
                          <th>Final</th>
                          <th>Solicitud Convenio</th>
                          <th>Acción</th>
                        </tr>
                      </thead>
                      <tbody>
					@foreach($periodos as $periodo)
                        <tr>
                          <th scope="row">{{$periodo->periodo}}</th>
                          <td>{{$periodo->observacion}}</td>
                          <td>{{$periodo->inicio}}</td>
                          <td>{{$periodo->final}}</td>
                          <td>{{$periodo->solicitud}}</td>
                       	  <th><a href="{{route('calendario.edit',$periodo->id)}}"><button type="button" class="btn btn-round btn-warning">Editar</button></a></th>		
                        </tr>
                    @endforeach   

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

		






                  </div>
                </div>
              </div>

</div>

@endsection