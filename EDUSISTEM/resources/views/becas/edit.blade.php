@extends('sidebar.sidebar')


@section('script-content')


/*evento para las teclas solo numeros*/
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


/*Evento para evento de letras */

   function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

@endsection


@section('content')

   <!-- page content -->
        <div class="right_col" role="main">         
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Becas 20/20 Editar</h2>                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="fondo-beca">                    
                    <br/>
 			 {!! Form::open(['route' => ['becas.update',$beca->id], 'method'=>'PUT', 'files'=>true,'data-parsley-validate','class'=>'form-horizontal form-label-left']) !!}
 			 			 <input type="text" name="users_id" style="display: none;" value="{{Auth::user()->id}}">		                 
                          <div align="center"><h2>Beca Nueva</h2></div>                         
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" value="{{$beca->nombre}}"  name="nombre" required="required" onkeypress="return soloLetras(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Monto:
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                              <input type="text" value="{{$beca->monto}}"  name="monto" required="required" onkeypress="return valida(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripción:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                              
                              <textarea required="required"  name="descripcion" class="form-control col-md-7 col-xs-12">{{$beca->descripcion}}</textarea>
                            </div>
                          </div>               
                        
                          
                         
                         
                          </div>
							
						          <div align="center">
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                        
                               {!! Form::submit('Registrar',['class'=>'btn btn-success','id'=>'btnEmpty' ]) !!}                          
                          </div>
                        </div>    
                      </div>
                  {{Form::close()}}
                  </div>
                </div>
              </div>
            </div>

      
            

         
        </div>
        <!-- /page content -->
@endsection

@section('script')

    <!--Este script es para las peticiones con ajax -->
    <script src="{{ asset('js/script.js')}}"></script>

     <script type="text/javascript" src="{{asset('template/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
    <!-- bootstrap-wysiwyg -->
    <script type="text/javascript" src="{{asset('template/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script> 
    <script type="text/javascript" src="{{asset('template/vendors/google-code-prettify/src/prettify.js')}}"></script>    
    <!-- jQuery Tags Input -->
    <script type="text/javascript" src="{{asset('template/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>

    

    <!-- Switchery -->
    <script type="text/javascript" src="{{asset('template/vendors/switchery/dist/switchery.min.js')}}"></script>
    <!-- Select2 -->
    <script type="text/javascript" src="{{asset('template/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- Parsley -->
    <script type="text/javascript" src="{{asset('template/vendors/parsleyjs/dist/parsley.js')}}"></script>
    <!-- Autosize -->
    <script type="text/javascript" src="{{asset('template/vendors/autosize/dist/autosize.min.js')}}"></script>   
    <!-- jQuery autocomplete -->
    <script type="text/javascript" src="{{asset('template/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>
    <!-- starrr -->
    <script type="text/javascript" src="{{asset('template/vendors/starrr/dist/starrr.js')}}"></script> 
@endsection    