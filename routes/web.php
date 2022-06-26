<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Rota da home
Route::get('/', 'App\Http\Controllers\Home\HomeController@index')->name("home.index");;

// Rota da autentificação
Auth::routes();

// Rota da avaliaçãos
Route::middleware(['auth', 'avaliacao'])->group(function (){
    Route::get('/avaliacao', 'App\Http\Controllers\Avaliacao\AvaliacaoController@dashboard')->name("avaliacao.dashboard");
    Route::get('/avaliacao/{id}/avaliar', 'App\Http\Controllers\Avaliacao\AvaliacaoController@avaliar')->name("avaliacao.avaliar");
    Route::get('/avaliaratividades', 'App\Http\Controllers\Avaliacao\AvaliacaoController@avaliaratividades')->name("avaliacao.avaliaratividades");
    Route::post('/avaliacao/avaliacaoPost', 'App\Http\Controllers\Avaliacao\AvaliacaoController@avaliacaoPost')->name("avaliacao.avaliacaoPost");
    Route::get('/avaliacao/editaravaliacao/{id}', 'App\Http\Controllers\Avaliacao\AvaliacaoController@editarAvaliacao')->name("avaliacao.editar");
    Route::put('/avaliacao/editaravaliacao', 'App\Http\Controllers\Avaliacao\AvaliacaoController@editarPost')->name("avaliacao.editarPost");
    Route::get('/avaliacao/todasatividades', 'App\Http\Controllers\Avaliacao\AvaliacaoController@todasatividades')->name("avaliacao.todasatividades");
});

// Rota da edição de perfil
Route::middleware(['auth'])->group(function (){
    Route::get('/perfil/{id}', 'App\Http\Controllers\Auth\PerfilController@editar')->name("auth.editar");
    Route::put('/perfil/post/{id}', 'App\Http\Controllers\Auth\PerfilController@editarPassword')->name("auth.editarPassword");
    Route::put('/perfil/photo/{id}', 'App\Http\Controllers\Auth\PerfilController@editarFoto')->name("auth.editarFoto");
    Route::put('/perfil/photo/deletar/{id}', 'App\Http\Controllers\Auth\PerfilController@deletarFoto')->name("auth.deletarFoto");
});

// Rotas das horas complementares
Route::middleware(['auth'])->group(function (){
    Route::get('/horas_complementares', 'App\Http\Controllers\Horas\HorasComplementaresController@dashboard')->name("horas_complementares.dashboard");
    Route::get('/horas_complementares/cadastrar', 'App\Http\Controllers\Horas\HorasComplementaresController@cadastrar')->name("horas_complementares.cadastrar");
    Route::post('/horas_complementares/post', 'App\Http\Controllers\Horas\HorasComplementaresController@cadastrarPost')->name("horas_complementares.cadastrarPost");
    Route::delete('/horas_complementares/{id}/deletar', 'App\Http\Controllers\Horas\HorasComplementaresController@deletar')->name("horas_complementares.deletar");
    Route::get('/horas_complementares/{id}/editar', 'App\Http\Controllers\Horas\HorasComplementaresController@editar')->name("horas_complementares.editar");
    Route::put('/horas_complementares/{id}/editar', 'App\Http\Controllers\Horas\HorasComplementaresController@editarPut')->name("horas_complementares.editarPut");
    Route::get('/horas_complementares/avaliados', 'App\Http\Controllers\Horas\HorasComplementaresController@avaliados')->name("horas_complementares.avaliados");
    Route::get('/horas_complementares/feedback/{id}', 'App\Http\Controllers\Horas\HorasComplementaresController@feedback')->name("horas_complementares.feedback");
});

// Route::get('/horas', 'App\Http\Controllers\HorasController@index')->name('horas.index');
