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

Route::get('usuario/index', 'UsuarioController@index');
Route::post('usuario/login', 'UsuarioController@login');
Route::get('usuario/sair', 'UsuarioController@sair');
Route::get('artigo/index', 'ArtigoController@index');
Route::get('artigo/sair', 'ArtigoController@sair');
Route::post('artigo/buscar', 'ArtigoController@buscar');
Route::get('artigo/listar', 'ArtigoController@listar');
Route::get('artigo/excluir/{id}', 'ArtigoController@excluir');