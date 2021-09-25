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

    public function index(){
        $listacondicao = $this->daoCondicaoPagamento->all(true);
        return view('condicaopagamento.index', compact('listacondicao'));
    }


    public function create()
    {
        return view('condicaopagamento.FormCondicaoPagamento');
    }



    public function store(Request $request)
    {

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


    // public function listCondicaoPagamento(Request $request){
    //     $listCondicao = $this->daoCondicaoPagamento->listCondicaoPagamento($request->id);
    //     $parcelas = $this->daoCondicaoPagamento->listaParcela($request->id);
    //     if ($request->id) {
    //         $data = array();
    //         $data =[
    //            "condicao" => $listCondicao,
    //            "parcelas"  => $parcelas
    //         ];
    //         return response::json(array('success' => true, 'data' => $data));
    //     }
    //     return response::json('error');      
    // }


    public function edit($id){
        $listacondicao = $this->daoCondicaoPagamento->listCondicaoPagamento($id);        
        return view('condicaopagamento.editarCondicao',compact('listacondicao'));
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
