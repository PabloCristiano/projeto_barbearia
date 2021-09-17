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
Route::get('/inicio', 'ControllerInicio@index');
Route::get('/pais', 'ControllerPais@index');
Route::get('/estado', 'ControllerEstado@index');
Route::get('/cidade', 'ControllerCidade@index');
Route::get('/cliente', 'ControllerCliente@index');
Route::get('/profissional', 'ControllerProfissional@index');
Route::get('/fornecedor', 'ControllerFornecedor@index');
Route::get('/categoria', 'ControllerCategoria@index');
Route::get('/produto', 'ControllerProduto@index');
Route::get('/servico', 'ControllerServico@index');
Route::get('/formapagamento', 'controllerFormaPagamento@index');
Route::get('/Condicaopagamento', 'controllerCondicaoPagamento@index');
Route::get('/agendamento', 'ControllerAgendamento@index');
Route::get('/compras', 'ControllerCompra@index');
Route::get('/teste', 'controllerCondicaoPagamento@teste');


//Rotas formularios
Route::get('/pais/adicionar', 'ControllerPais@create');
Route::get('/compras/adicionar', 'ControllerCompra@create');
Route::get('/condicaopagamento/adicionar', 'ControllerCondicaoPagamento@create');


//Rotas inserir banco
Route::post('/pais','ControllerPais@store');
Route::post('/estado','ControllerEstado@store');
Route::post('/cidade','ControllerCidade@store');
Route::post('/servico','ControllerServico@store');
Route::post('/categoria','ControllerCategoria@store');
Route::POST('/formapagamento','ControllerFormaPagamento@store');
Route::POST('/condicaopagamento','ControllerCondicaoPagamento@store');
Route::POST('/profissional','ControllerProfissional@store');
Route::POST('/fornecedor','ControllerFornecedor@store');
Route::POST('/produto','ControllerProduto@store');
Route::POST('/cliente','ControllerCliente@store');



//Rotas para Deletar banco
Route::get('/pais/apagar/{id}','ControllerPais@destroy');
Route::get('/estado/excluir/{id}','ControllerEstado@destroy');
Route::get('/cidade/excluir/{id}','ControllerCidade@destroy');
Route::get('/servico/excluir/{id}','ControllerServico@destroy');
Route::get('/categoria/excluir/{id}','ControllerCategoria@destroy');
Route::get('/formapagamento/excluir/{id}','ControllerFormaPagamento@destroy');
Route::get('/profissional/excluir/{id}','ControllerProfissional@destroy');
Route::get('/fornecedor/excluir/{id}','ControllerFornecedor@destroy');
Route::get('/produto/excluir/{id}','ControllerProduto@destroy');
Route::get('/cliente/excluir/{id}','ControllerCliente@destroy');


//Rotas para Buscar
Route::get('/pais/buscar', 'ControllerPais@buscar');
Route::get('/agendamento/buscar', 'ControllerAgendamento@show')->name('/agendamento/buscar');
Route::get('/agendamento/addhora', 'ControllerAgendamento@addhora')->name('/agendamento/addhora');
Route::get('/showProfissionais', 'ControllerProfissional@showProfissional')->name('showProfissionais');
Route::get('/showClientes', 'ControllerCliente@showClientes')->name('showClientes');
//pesquisar profissional
Route::POST('/searchProfissional', 'ControllerProfissional@searchProfissional')->name('searchProfissional');
Route::POST('/searchServico', 'ControllerServico@findById')->name('searchServico');
Route::POST('/searchCliente', 'ControllerCliente@findById')->name('searchCliente');


//Rotas para Editar
Route::post('/pais/editar/','ControllerPais@edit');
Route::post('/estado/alterar', 'ControllerEstado@update');
Route::post('/cidade/alterar', 'ControllerCidade@update');
Route::post('/servico/alterar', 'ControllerServico@update');
Route::post('/categoria/alterar', 'ControllerCategoria@update');
Route::post('/formapagamento/alterar', 'ControllerFormaPagamento@update');
Route::post('/profissional/alterar', 'ControllerProfissional@update');
Route::post('/fornecedor/alterar', 'ControllerFornecedor@update');
Route::post('/produto/alterar', 'ControllerProduto@update');
Route::post('/cliente/alterar', 'ControllerCliente@update');

//Rota showTable
Route::POST('registro', ['as' => 'registro.registro', 'uses' => 'ControllerPais@Registro']);
Route::POST('registroestado', ['as' => 'registroestado.registroestado', 'uses' => 'ControllerEstado@RegistroEstado']);
Route::POST('registrocidade', ['as' => 'registrocidade.registrocidade', 'uses' => 'ControllerCidade@RegistroCidade']);
Route::POST('registroservico', ['as' => 'registroservico.registroservico', 'uses' => 'ControllerServico@RegistroServico']);
Route::POST('registrocategoria', ['as' => 'registrocategoria.registrocategoria', 'uses' => 'ControllerCategoria@RegistroCategoria']);
Route::POST('registrofornecedor', ['as' => 'registrofornecedor.registrofornecedor', 'uses' => 'ControllerFornecedor@RegistroFornecedor']);
Route::POST('cadparcela', ['as' => 'cadparcela.cadparcela', 'uses' => 'ControllerCondicaoPagamento@store']);

Route::get('showpais', ['as' => 'showpais.showpais', 'uses' => 'ControllerPais@showpais']);
Route::get('showestados', ['as' => 'showestados.showestados', 'uses' => 'ControllerEstado@showestado']);
Route::get('showcidades', ['as' => 'showcidades.showcidades', 'uses' => 'ControllerCidade@showcidade']);
Route::get('showservicos', ['as' => 'showservicos.showservicos', 'uses' => 'ControllerServico@showServico']);
Route::get('showcategoria', ['as' => 'showcategoria.showcategoria', 'uses' => 'ControllerCategoria@showcategoria']);
Route::get('showfornecedor', ['as' => 'showfornecedor.showfornecedor', 'uses' => 'ControllerFornecedor@showFornecedor']);

//Teste
Route::get('testepablo', ['as' => 'testepablo.testepablo', 'uses' => 'ControllerCidade@edit']);



//rotas ajax cidades
//Route::get('cidadestore', ['as' => 'cidadestore.cidadestore', 'uses' => 'ControllerCidade@store']);


Route::get('/debug','ControllerCondicaoPagamento@debug');

//add

Route::POST('adicionarcliente', ['as' => 'adicionarcliente.adicionarcliente', 'uses' => 'ControllerCliente@clienteadd']);
