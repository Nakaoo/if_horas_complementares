<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\Home\HomeController@index')->name("home.index");;

Auth::routes();

Route::middleware(['auth', 'avaliacao'])->group(function (){
    Route::get('/avaliacao', 'App\Http\Controllers\Avaliacao\AvaliacaoController@dashboard')->name("avaliacao.dashboard");
    Route::get('/avaliacao/{id}/avaliar', 'App\Http\Controllers\Avaliacao\AvaliacaoController@avaliar')->name("avaliacao.avaliar");
    Route::post('/avaliacao/avaliacaoPost', 'App\Http\Controllers\Avaliacao\AvaliacaoController@avaliacaoPost')->name("avaliacao.avaliacaoPost");
});


Route::middleware(['auth'])->group(function (){
    Route::get('/horas_complementares', 'App\Http\Controllers\Horas\HorasComplementaresController@dashboard')->name("horas_complementares.dashboard");
    Route::get('/horas_complementares/cadastrar', 'App\Http\Controllers\Horas\HorasComplementaresController@cadastrar')->name("horas_complementares.cadastrar");
    Route::post('/horas_complementares/post', 'App\Http\Controllers\Horas\HorasComplementaresController@cadastrarPost')->name("horas_complementares.cadastrarPost");
    Route::delete('/horas_complementares/{id}/deletar', 'App\Http\Controllers\Horas\HorasComplementaresController@deletar')->name("horas_complementares.deletar");
    Route::get('/horas_complementares/{id}/editar', 'App\Http\Controllers\Horas\HorasComplementaresController@editar')->name("horas_complementares.editar");
    Route::put('/horas_complementares/{id}/editar', 'App\Http\Controllers\Horas\HorasComplementaresController@editarPut')->name("horas_complementares.editarPut");
});

// Route::get('/horas', 'App\Http\Controllers\HorasController@index')->name('horas.index');
