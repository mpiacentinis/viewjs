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

Route::get('/Produto', 'ProdutosController@index');
Route::post('/Produto', 'ProdutosController@store');
Route::get('/Produto/{id}', 'ProdutosController@show');
Route::delete('/Produto/{id}', 'ProdutosController@destroy');
Route::put('/Produto/{id}', 'ProdutosController@update');


Route::get('/Promocao', 'PromocaosController@index');
Route::post('/Promocao', 'PromocaosController@store');
Route::get('/Promocao/{id}', 'PromocaosController@show');
Route::delete('/Promocao/{id}', 'PromocaosController@destroy');
Route::put('/Promocao/{id}', 'PromocaosController@update');


Route::get('/ItensPromocao', 'ItensPromocaosController@index');
Route::post('/ItensPromocao', 'ItensPromocaosController@store');
Route::get('/ItensPromocao/{id}', 'ItensPromocaosController@show');
Route::delete('/ItensPromocao/{id}', 'ItensPromocaosController@destroy');
Route::put('/ItensPromocao/{id}', 'ItensPromocaosController@update');


