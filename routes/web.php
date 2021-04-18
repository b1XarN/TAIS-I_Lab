<?php

use Illuminate\Support\Facades\Route;

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
    // return view('welcome');
    return view('plantilla');
});
Route::resource('empresa','EmpresaController');
Route::get('cancelarempresa', function(){
    return redirect()->route('empresa.index')->with('datos','Accion Cancelada');
})->name('cancelarempresa');
Route::resource('proceso','ProcesoController');
Route::get('cancelarproceso/{id}', function($id){
    return redirect()->route('proceso.show', $id)->with('datos','Accion Cancelada');
})->name('cancelarproceso');
Route::get('proceso/{idproceso}/confirmar','ProcesoController@confirmar')->name('proceso.confirmar');
Route::get('procesoc/{id}','ProcesoController@create')->name('proceso.create');
Route::get('procesos/{id}','ProcesoController@show')->name('proceso.show');
Route::post('procesost/{id}','ProcesoController@store')->name('proceso.store');
Route::put('procesou/{id}','ProcesoController@update')->name('proceso.update');
Route::delete('procesosd/{id}','ProcesoController@destroy')->name('proceso.destroy');