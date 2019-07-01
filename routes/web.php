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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'ReceitaController@index')->name('receita');
Route::get('/cadastrar', 'ReceitaController@cadastrar')->name('receita.cadastrar');
Route::post('/cadastrar', 'ReceitaController@registrar')->name('receita.registrar');
Route::get('/editar/{id}', 'ReceitaController@editar')->name('receita.editar');
Route::post('/editar/{id}', 'ReceitaController@alterar')->name('receita.alterar');
Route::get('/deletar/{id}', 'ReceitaController@deletar')->name('receita.deletar');
Route::get('/ver/{id}', 'ReceitaController@ver')->name('receita.ver');