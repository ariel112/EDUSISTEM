@extends('sidebar.sidebar')


@section('link')     
       

          <style type="text/css">
              #canvas{
                display: none;
                     }
                   
          </style>


@endsection

@section('content')


     <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
        

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tomar fotografia</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <div  align="center">
                        <!--Ventana de camara para la pc -->
                        <div id="camara-pc">
                          <video id="video" style="width: 450px; height: 340px; border-radius: 5px;"></video><br>
                          <button id="startbutton" class="btn btn-info">Tomar Foto</button>
                        </div>     
                    </div>

                      <canvas id="canvas"></canvas>
                      <div align="center" id="camara-pc">
                        <br><br>
                        <img src="{{ asset('images/user.png') }}" id="photo" alt="photo" style="width: 400px; height: 340px; border-radius: 5px;">    
                        <br>
                       </div> 
                      <div align="center">  
                      {!! Form::open(['route' => ['usuario.fotoTomada',Auth::user()->id],'files'=>true, 'method'=>'POST']) !!}
                       <textarea style="visibility: hidden;" name="base64" id="base64"></textarea>
                       <input style="visibility: hidden;" type="text" name="id_usuario" value='{{Auth::user()->id}}'>
                         
                       <!--Ventana de camara para el cel -->
                       <div align="center" id="camara-cel">        
                          <input  name="img_url" type="file"  accept="image/*" capture="camera">
                       </div>
                      <div align="center">
                      {!! Form::submit('Guardar Foto',['class'=>'btn btn-info', 'id'=>'btnInfo']) !!}
                      {!! Form::close()!!}       
                      </div>
                      
                      </div>

                      <div id="contenido"></div>



                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
  
@endsection


@section('script')

       
         <script  src="{{asset('js-camara/bootstrap.min.js')}}"></script>         
      
         <script  src="{{asset('js-camara/npm.js')}}"></script>

         <script type="text/javascript">
            var imagen = "";
            (function() {

              var streaming    = false,
                  video        = document.querySelector('#video'),
                  canvas       = document.querySelector('#canvas'),
                  photo        = document.querySelector('#photo'),
                  startbutton  = document.querySelector('#startbutton'),
                  width      = 320,
                  height     = 0;

              navigator.getMedia = ( navigator.getUserMedia ||
                                     navigator.webkitGetUserMedia ||
                                     navigator.mozGetUserMedia ||
                                     navigator.msGetUserMedia);

              navigator.getMedia(
                {
                  video: true,
                  audio: false
                },
                function(stream) {
                  if (navigator.mozGetUserMedia) {
                    video.mozSrcObject = stream;
                  } else {
                    var vendorURL = window.URL || window.webkitURL;
                    video.src = vendorURL.createObjectURL(stream);
                  }
                  video.play();
                },
                function(err) {
                  console.log("An error occured! " + err);
                }
              );

              video.addEventListener('canplay', function(ev){
                if (!streaming) {
                  height = video.videoHeight / (video.videoWidth/width);
                  video.setAttribute('width', width);
                  video.setAttribute('height', height);
                  canvas.setAttribute('width', width);
                  canvas.setAttribute('height', height);
                  streaming = true;
                }
              }, false);

              function takepicture() {
                canvas.width = width;
                canvas.height = height;
                canvas.getContext('2d').drawImage(video, 0, 0, width, height);
                var data = canvas.toDataURL('image/png');
                imagen = canvas.toDataURL('image/png');

                

                photo.setAttribute('src', data);
              }

              startbutton.addEventListener('click', function(ev){
                  takepicture();
                  document.getElementById('base64').value=imagen;
                ev.preventDefault();
                //alert("Foto Tomada");
              }, false);

            })();

            function ModificarDiv(){
              document.getElementById("contenido").innerHTML = imagen;
            }
          </script>
        
@endsection