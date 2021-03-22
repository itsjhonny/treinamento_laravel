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
    return view('welcome');
});


//EQUIPAMENTOS
Route::group(['prefix' => 'equipamentos/'], function () {

    Route::get('/', 'EquipamentosController@index')->name('equipamentos_home');
    Route::get('/criar', 'EquipamentosController@create')->name('criar_equipamento');
    Route::get('/exibir/{id_equipamento}', 'EquipamentosController@show')->name('exibir_equipamento');
    Route::get('/atualizar/{id_equipamento}', 'EquipamentosController@edit')->name('form_editar_equipamento');

    Route::post('/criar', 'EquipamentosController@store');

    Route::put('/atualizar/{id_equipamento}', 'EquipamentosController@update')->name('atualizar_equipamento');

    Route::delete('/excluir/{id_equipamento}', 'EquipamentosController@destroy');
});



//RESERVAS
Route::group(['prefix' => 'reserva/'], function () {
    Route::get('/', 'ReservaController@index')->name('reserva_home');
    
    Route::get('/criar', 'ReservaController@create')->name('criar_reserva');    
    Route::get('/atualizar/{id_reserva}', 'ReservaController@edit')->name('form_editar_reserva');
    
    Route::put('/atualizar/{id_reserva}', 'ReservaController@update')->name('atualizar_reserva');

    Route::post('/criar', 'ReservaController@store');

    Route::get('listar/{mes}/{ano}', 'ReservaController@listar');
});
