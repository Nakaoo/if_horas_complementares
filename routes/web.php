<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', 'App\Http\Controllers\Home\HomeController@index')->name("home.index");;
route::get('/horas_complementares/todas', 'App\Http\Controllers\Horas\HorasComplementaresController@todasHoras')->name("horas_complementares.todasHoras");
Route::get('/horas_complementares', 'App\Http\Controllers\Horas\HorasComplementaresController@cadastrar')->name("horas_complementares.cadastrar");
Route::post('/horas_complementares/post', 'App\Http\Controllers\Horas\HorasComplementaresController@cadastrarPost')->name("horas_complementares.cadastrarPost");
// Route::get('/horas', 'App\Http\Controllers\HorasController@index')->name('horas.index');
