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
    return view('index');
});


Route::get('/autores', 'AutorController@index');
Route::get('/autores/create', 'AutorController@create');
Route::post('/autores', 'AutorController@store');
Route::get('/autores/apagar/{id}', 'AutorController@destroy');
Route::get('/autores/editar/{id}', 'AutorController@edit');
Route::post('/autores/{id}', 'AutorController@update');

Route::get('/editoras', 'EditoraController@index');
Route::get('/editoras/create', 'EditoraController@create');
Route::post('/editoras', 'EditoraController@store');
Route::get('/editoras/apagar/{id}', 'EditoraController@destroy');
Route::get('/editoras/editar/{id}', 'EditoraController@edit');
Route::post('/editoras/{id}', 'EditoraController@update');

Route::get('/gen_literarios', 'GeneroLiterarioController@indexView');
Route::get('/gen_literarios/create', 'GeneroLiterarioController@create');
Route::get('/gen_literarios/apagar/{id}', 'GeneroLiterarioController@destroy');

Route::get('/livros', 'LivroController@index');
Route::get('/livros/create', 'LivroController@create');
Route::post('/livros', 'LivroController@store');
Route::get('/livros/apagar/{id}', 'LivroController@destroy');
Route::get('/livros/editar/{id}', 'LivroController@edit');
Route::post('/livros/{id}', 'LivroController@update');
