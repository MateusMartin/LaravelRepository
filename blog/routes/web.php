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




Route::get('/login',['uses' => "controller@fazerlogin"]);
Route::post('/login',['as' => 'user.login' ,'uses' => "DashboardController@auth"]);
Route::get('/logado',['as' => 'user.dashboard' ,'uses' => "DashboardController@index"]);

Route::get('/marcas',['as' => 'user.marcas' ,'uses' => "MarcasController@index"]);
Route::get('/categoria',['as' => 'user.categoria' ,'uses' => "CategoriaController@index"]);
Route::get('/produtos',['as' => 'user.produtos' ,'uses' => "ProdutosController@index"]);
Route::get('/cadastro',['as' => 'user.posts' ,'uses' => "CadastroController@index"]);
Route::post('/cadastro',['as' => 'user.cadastrar' ,'uses' => "CadastroController@insert"]);

Route::post('/edit',['as' => 'user.edit' ,'uses' => "CadastroController@edit"]);
Route::get('/delete',['as' => 'user.delete' ,'uses' => "CadastroController@destroy"]);
Route::post('/alterar',['as' => 'user.alterar' ,'uses' => "CadastroController@update"]);
Route::get('/deslogar',['as' => 'user.alterar' ,'uses' => "DashboardController@deslogar"]);

Route::resource('destroi','CadastroController');


