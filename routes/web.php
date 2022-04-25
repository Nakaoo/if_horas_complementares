<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\Home\HomeController@index')->name("home.index");;
route::get('/horas_complementares', 'App\Http\Controllers\Horas\HorasComplementaresController@dashboard')->name("horas_complementares.dashboard");
Route::get('/horas_complementares/cadastrar', 'App\Http\Controllers\Horas\HorasComplementaresController@cadastrar')->name("horas_complementares.cadastrar");
Route::post('/horas_complementares/post', 'App\Http\Controllers\Horas\HorasComplementaresController@cadastrarPost')->name("horas_complementares.cadastrarPost");

Route::middleware('auth')->group(function (){
    Route::delete('/horas_complementares/{id}/deletar', 'App\Http\Controllers\Horas\HorasComplementaresController@deletar')->name("horas_complementares.deletar");
    Route::get('/horas_complementares/{id}/editar', 'App\Http\Controllers\Horas\HorasComplementaresController@editar')->name("horas_complementares.editar");
    Route::put('/horas_complementares/{id}/editar', 'App\Http\Controllers\Horas\HorasComplementaresController@editarPut')->name("horas_complementares.editarPut");
});

Auth::routes();
// Route::get('/horas', 'App\Http\Controllers\HorasController@index')->name('horas.index');
