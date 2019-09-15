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

     return view('auth.login');
});


//Route::get('/CarCrud','CarBrandsController@index');

//Route::get('/CarCrud/create','CarBrandsController@index');


Route::resource('CarCrud','CarBrandsController')->middleware('auth');

Route::resource('CarModels','CarModelsController')->middleware('auth');

Route::resource('Usuarios','ControladorCrudUsers') ->middleware('auth');

Auth::routes(['register'=>false,'reset'=>false]); /** deshabilitando opcion de registro*/ 

Route::get('/admin', 'CarBrandsController@index') ->middleware('auth');

// name('admin');


// Route::get('/admin','AdministradorController@index'); /*@ hacer referencia funcion principal Administrador controller */


 Route::get('/Operator/{value}','Operator@index');










