<?php

namespace App\Http\Dao;

use App\Http\Dao\Dao;
use App\Http\Dao\DaoFormaPagamento;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Http\Models\Parcela;

class DaoParcela implements Dao {

    private DaoFormaPagamento $daoFormaPagamento;

    public function __construct(){
        $this->daoFormaPagamento = new DaoFormaPagamento();
        
    }

    public function all(bool $model = false){

       
    }

    public function create(array $dados){
        $parcela = new Parcela();

        if (isset($dados["id"]))
            $parcela->setId($dados["id"]);

        $parcela->setParcela($dados["parcela"]);
        $parcela->setPrazo($dados["prazo"]);
        $parcela->setPorcentagem((float) $dados["porcentagem"]);
        $formaPagamento = $this->daoFormaPagamento->findById($dados["idformapg"], true);
        $parcela->setFormaPagamento($formaPagamento);

        return $parcela;

    }

    public function store($parcela){
        DB::beginTransaction();
        try {
            $dados = $this->getData($parcela);
            DB::table('parcelas')->insert($dados);
            DB::commit();

            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    public function update(Request $request){

    }

    public function delete($id){

    }

    public function findById(int $id, bool $model = false){
               
        
    }


    public function getData(Parcela $parcela) {

        $dados = [
            'parcela'            =>  $parcela->getParcela(),
            'prazo'              =>  $parcela->getPrazo(),
            'porcentagem'        =>  $parcela->getPorcentagem(),
            'idformapg'          =>  $parcela->getFormaPagamento()->getId(),
        ];

        return $dados;
    }



    public function gerarParcelas(array $parcelas) {
        $par = array();
        $qtd = count($parcelas);
        for($i=0; $i<$qtd; $i++ ){

            $dadosParcela = [
                "parcela"            => $parcelas[$i]["parcela"],
                "prazo"              => $parcelas[$i]["prazo"],
                "porcentagem"        => $parcelas[$i]["porcentagem"],
                "id_formapg"          => $parcelas[$i]["idformapg"],
            ];

           

            array_push($par, $dadosParcela);
        
        } 

        
        return $par;
    }

   




}