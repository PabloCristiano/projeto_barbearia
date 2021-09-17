<?php
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Route;

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

Route::get('/index', function () {
    return view('/index');
});

//Rotas Index
Route::get('/pais', 'ControllerPais@index');
Route::get('/estado', 'ControllerEstado@index');
Route::get('/cidade', 'ControllerCidade@index');
Route::get('/cliente', 'ControllerCliente@index');
Route::get('/profissional', 'ControllerProfissional@index');
Route::get('/fornecedor', 'ControllerFornecedor@index');
Route::get('/categoria', 'ControllerCategoria@index');
Route::get('/produto', 'ControllerProduto@index');
Route::get('/servico', 'ControllerServico@index');


//Rotas formularios
Route::get('/pais/adicionar', 'ControllerPais@create');


//Rotas inserir banco
Route::post('/pais','ControllerPais@store');
Route::post('/estado','ControllerEstado@store');
Route::post('/cidade','ControllerCidade@store');
Route::post('/servico','ControllerServico@store');


//Rotas para Deletar banco
Route::get('/pais/apagar/{id}','ControllerPais@destroy');
Route::get('/estado/excluir/{id}','ControllerEstado@destroy');
Route::get('/cidade/excluir/{id}','ControllerCidade@destroy');
Route::get('/servico/excluir/{id}','ControllerServico@destroy');


//Rotas para Buscar
Route::get('/pais/buscar', 'ControllerPais@buscar');


//Rotas para Editar
Route::post('/pais/editar/','ControllerPais@edit');
Route::post('/estado/alterar', 'ControllerEstado@update');
Route::post('/cidade/alterar', 'ControllerCidade@update');
Route::post('/servico/alterar', 'ControllerServico@update');

//Rota showTable
Route::get('registro', ['as' => 'registro.registro', 'uses' => 'ControllerPais@Registro']);
Route::get('registroestado', ['as' => 'registroestado.registroestado', 'uses' => 'ControllerEstado@RegistroEstado']);
Route::get('showpais', ['as' => 'showpais.showpais', 'uses' => 'ControllerPais@showpais']);
Route::get('showestados', ['as' => 'showestados.showestados', 'uses' => 'ControllerEstado@showestado']);


//rotas ajax cidades
//Route::get('cidadestore', ['as' => 'cidadestore.cidadestore', 'uses' => 'ControllerCidade@store']);



