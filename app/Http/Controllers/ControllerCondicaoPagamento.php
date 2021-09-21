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
        $listacondicao = $this->daoCondicaoPagamento->all(false);
        return view('condicaopagamento.index',compact('listacondicao'));
    }


    public function create()
    {
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
            'total_parcelas' => $request->total_parcelas,
            'parcelas' => $request->parcelas,
        ];


        $condicao = $this->daoCondicaoPagamento->create($dados);

        $store = $this->daoCondicaoPagamento->store($condicao);
        //$parcelas = $request->parcelas;
        //$teste = $parcela[0]['prazo'];
        //$teste2 = $parcela[0]['idformapg'];   
        // $storeparcelas = $this->daoparcela->store($parcelas);  
        return response::json(array('success' => true, 'data' => $store));
    }


    public function listCondicaoPagamento()
    {
        $listCondicao = $this->daoCondicaoPagamento->listCondicaoPagamento();
        if ($listCondicao) {
            return $listCondicao;
        }
        return 'error';
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
    }


    public function destroy($id)
    {
    }

    public function debug()
    {
        $debug = $this->daoCondicaoPagamento->buscar();
        dd($debug);
    }
}
