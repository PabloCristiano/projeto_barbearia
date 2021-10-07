<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Dao\DaoFormaPagamento;
use App\Http\Dao\DaoCondicaoPagamento;
use App\Http\Dao\DaoParcela;


class ControllerCondicaoPagamento extends Controller
{

    private DaoCondicaoPagamento $daoCondicaoPagamento;
    private DaoFormaPagamento    $daoFormaPagamento;
    private DaoParcela           $daoparcela;

    public function __construct()
    {
        $this->daoCondicaoPagamento = new DaoCondicaoPagamento();
        $this->daoFormaPagamento = new DaoFormaPagamento();
        $this->daoparcela = new  DaoParcela();
    }

    public function index()
    {
        $listacondicao = $this->daoCondicaoPagamento->all(true);
        return view('condicaopagamento.index', compact('listacondicao'));
    }


    public function create(){
        return view('condicaopagamento.FormCondicaoPagamento');
    }



    public function store(Request $request){

        $dados = [
            'id' => $request->id,
            'condicao_pagamento' => $request->condicao_pagamento,
            'juros' => $request->juros,
            'multa' => $request->multa,
            'desconto' => $request->desconto,
            'data_create' => $request->data_create,
            'data_alt' => $request->data_alt,
            'qtd_parcela' => $request->total_parcelas,
            'parcelas' => $request->parcelas,
        ];


        $condicao = $this->daoCondicaoPagamento->create($dados);
        $store = $this->daoCondicaoPagamento->store($condicao);
        return response::json(array('success' => true, 'data' => $store));
    }

     public function edit($id){
        $listacondicao = $this->daoCondicaoPagamento->listCondicaoPagamento($id);
        return view('condicaopagamento.editarCondicao', compact('listacondicao'));
    }


    public function update(Request $request){
        // $listacondicao = $this->daoCondicaoPagamento->listCondicaoPagamento(271);
        //dd($request->all());
        //pegar as parcelas 
        $itens = json_decode($request->parcelas_array[0],true);
        $dadosParcelas = array();
        foreach ($itens as $item){
            array_push($dadosParcelas, $item);
        }         
      $par = array();
      $qtd = $request->total_parcelas;
      for ($i = 0; $i < $qtd; $i++) {
          $dadosParcela = [
              "parcela"            => $dadosParcelas[$i]["parcela"],
              "prazo"              => $dadosParcelas[$i]["prazo"],
              "porcentagem"        => $dadosParcelas[$i]["porcentagem"],
              "idformapg"          => $dadosParcelas[$i]["idformapg"],
          ];
          array_push($par, $dadosParcela);
      }
      //dd($par);
      $dados = [
          'id' => $request->id,
          'condicao_pagamento' => $request->condicao_pagamento,
          'juros' => $request->juros,
          'multa' => $request->multa,
          'desconto' => $request->desconto,
          'data_create' => $request->data_create,
          'data_alt' => $request->data_alt,
          'qtd_parcela' => $request->total_parcelas,
          'parcelas' => $par,
      ];
      dd($dados);    
     
    }


    public function destroy($id){

    }

    public function showCondicaoPagamento(){
        $condicao = $this->daoCondicaoPagamento->showCondicaoPagamento();
        return $condicao;
    }

    public function searchCondicaoPagamento(Request $request){
        $search = $this->daoCondicaoPagamento->findById($request->search,false);
        if($search){
            return response()->json($search);
        }        
        return response()->json('error');
    }

}
