<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

/*Home principal con el sidebar*/
Route::get('/home', 'HomeController@index')->name('sidebar');

/*Ruta del administrador*/
Route::resource("admin","UserController");

/*Obtener los perfiles de los usuarios*/
Route::get('admin/perfil/{id}',
                       [
                        'as'=>'user.perfil',
                        'uses'=>'UserController@perfil'
                       ]);

/*ruta para las acciones en el sistema*/
Route::get('sistema/acciones',[ 
                'as'=>'admin.bitacora',
                 'uses'=> 'ConvenioController@bitacora'
                  ]);


/*Ruta para cambiar los estados de los departamentos de lo usuarios*/
Route::POST('/editar-estado/{id}','UserController@estado')->name('editar-estado');

/*Ruta para agragarle departamento a los usuario */
Route::PUT('agregar-depa/{id}','UserController@depa')->name('depa-agregar'); 

/*Ruta para cambiar los estados de los empleados*/
Route::PUT('/agregar-cargo/{id}','UserController@cargo')->name('agregar-estado');



/*Ruta para los aspirantes*/
Route::resource('aspirantes','AspirantesController');
/*Ruta para obtener los municipios*/
Route::get('/municipios/{id}', 'AspirantesController@getMunicipios')->name('agregar-municipio');

/*Obtener los perfiles de los usuarios*/
Route::get('aspirantes/perfil/{id}',
                       [
                        'as'=>'aspirantes.perfil',
                        'uses'=>'AspirantesController@perfil'
                       ]);

/*Ruta para los perfiles de los usuarios en el sistema*/
Route::resource('perfil/usuario', 'PerfilController');
Route::get('usuarios/fotografia',[
             'as'=>'usuario.foto',
             'uses'=>'PerfilController@foto']);

Route::POST('usuarios/fotografiat',[
'as'=>'usuario.fotoTomada',
 'uses'=>'perfilController@tomarfoto'
]); 


/*Ruta para los calendarios Academicos por universidad*/
Route::resource('universidades/calendario','CalendarioController');

Route::get('CalendarioGlobal',[ 
                'as'=>'calendario.academico',
                 'uses'=> 'CalendarioController@calendario'
                  ]);
/*perfil de la suniversidadess*/
Route::get('perfil/universidad/{id}',[ 
                'as'=>'universidad.perfil',
                 'uses'=> 'CalendarioController@perfil'
                  ]);
/*Convenios controller*/
Route::resource('universidad/convenio','ConvenioController');


/*Becas*/
Route::resource('universidad/becas','BecaController');


/*Ruta para la actualizacion de documentos*/
Route::resource('becario/actualizacion','ActualizacionController');
/*Obtener los perfiles de los usuarios para acutalizar*/
Route::get('becarios/actualizacion/ver/{id}',
                       [
                        'as'=>'actualizacion.perfil',
                        'uses'=>'ActualizacionController@perfil'
                       ]);

/*Ruta para obtener los mese que se pueden pagar en una universidad*/
Route::resource('pagos/universidad/meses','PagoMesesController');
/*RUta para ver los perfiles de meses que se pueden pagar segun univerisad*/
/*Obtener los perfiles de los usuarios*/
Route::get('pagos/universidad/meses/perfil/{id}',
                       [
                        'as'=>'meses.perfil',
                        'uses'=>'PagoMesesController@perfil'
                       ]);


/*Retencion de pagos */
Route::resource('pagos/retencion','RetencionPagosController');
/*Perfil de los becarios que se les va a retener el pago*/
Route::get('pagos/retencion/perfil/becarios/{id}',
                       [
                        'as'=>'retencion.perfil',
                        'uses'=>'RetencionPagosController@perfil'
                       ]);
/*Ruta para la digitalizacion de documentos*/
Route::resource('actualizacion/documentos','ExpedientesController');

/*Ruta para cargar la ficha*/
Route::POST('actualizacion/documentos/ficha',[
'as'=>'ficha.store',
 'uses'=>'ExpendientesController@ficha01'
]); 

/*Ruta para mostrar los estatus de los becarios*/
Route::resource('becarios/estatus','EstatusController');

/*Obtener los perfiles de los becarios estatus*/
Route::get('becarios/estatus/perfil/{id}',
                       [
                        'as'=>'estatus.perfil',
                        'uses'=>'EstatusController@perfil'
                       ]);

/* PREPLANILLAS*/
Route::resource('pre-planilla','PREPlanillasController');