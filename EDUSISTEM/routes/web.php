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


/*Ruta para cambiar los estados de los departamentos de lo usuarios*/
Route::POST('/editar-estado/{id}','UserController@estado')->name('editar-estado');

/*Ruta para agragarle departamento a los usuario */
Route::PUT('agregar-depa/{id}','UserController@depa')->name('depa-agregar'); 

/*Ruta para cambiar los estados de los empleados*/
Route::PUT('/agregar-cargo/{id}','UserController@cargo')->name('agregar-estado');

/*Ruta para los aspirantes*/
Route::resource('aspirantes','AspirantesController');

/*Obtener los perfiles de los usuarios*/
Route::get('aspirantes/perfil/{id}',
                       [
                        'as'=>'aspirantes.perfil',
                        'uses'=>'AspirantesController@perfil'
                       ]);