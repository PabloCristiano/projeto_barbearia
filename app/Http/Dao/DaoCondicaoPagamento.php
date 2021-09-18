<?php

namespace App\Http\Dao;

use App\Http\Dao\Dao;
use App\Http\Dao\DaoParcela;
use App\Http\Models\CondicaoPagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class DaoCondicaoPagamento implements Dao {

    private DaoParcela $daoParcela;

    public function __construct(){
        $this->daoParcela = new DaoParcela();        
    }

    public function all(bool $model = false){

    }

    public function create(array $dados){
       $condicaoPagamento = new CondicaoPagamento();

       if(isset($dados["id"])){
        $condicaoPagamento->setId(($dados["id"]));
         //$condicaoPagamento->setDataCadastro($dados["data_cadastro"] ?? null);
        //$condicaoPagamento->setDataAlteracao($dados["data_alteracao"]??null);
       }
       $condicaoPagamento->setCondicaoPagamento($dados["condicao_pagamento"]);
       $condicaoPagamento->setJuros((float)$dados["juros"]);
       $condicaoPagamento->setMulta((float)$dados["multa"]);
       $condicaoPagamento->setDesconto((float)$dados["desconto"]);
       $totalParcelas = $dados["total_parcelas"];
       $condicaoPagamento->setTotalParcelas($totalParcelas);
   /*
       if ($totalParcelas > 0) {

        $parcelas = array();
        //$dadosParcelas = array();
        

        }

        else if ($condicaoPagamento->getId() > 0) {
            $parcelas = $this->buscarParcelas($condicaoPagamento->getId());
        }
    */
        $parcelas = $this->gerarParcelas($dados["parcelas"],$condicaoPagamento);
        $condicaoPagamento->setParcelas($parcelas);              
       return $condicaoPagamento;
    
    }

    public function gerarParcelas($dadosParcelas, $condicaoPagamento){
        $par = array();
        $qtd = $condicaoPagamento->getTotalParcelas();
        for($i=0; $i<$qtd; $i++ ){
            $dadosParcela = [
                "parcela"            => $dadosParcelas[$i]["parcela"],
                "prazo"              => $dadosParcelas[$i]["prazo"],
                "porcentagem"        => $dadosParcelas[$i]["porcentagem"],
                "idformapg"          => $dadosParcelas[$i]["idformapg"],
            ];
             array_push($par, $dadosParcela);
        
        }        
        return $par;        
    }

    public function salvarParcelas(array $parcelas, $idCondicaoPagamento) {       
        $qtd = count($parcelas);  
        DB::beginTransaction();
            try {
                for($i=0; $i<$qtd; $i++ ){
                    $dadosParcela= [
                        'parcela'                => $parcelas[$i]["parcela"],
                        'prazo'                  => $parcelas[$i]["prazo"],
                        'porcentagem'            => $parcelas[$i]["porcentagem"],
                        'idformapg'             => $parcelas[$i]["idformapg"],
                        'idcondpg'              => $idCondicaoPagamento,
                    ];
                    DB::table('parcelas')->insert($dadosParcela);
                }
                DB::commit();
                return true;
            } catch (\Throwable $th) {
                return $th;
            }
        

        
    }

    public function buscarParcelas($idCondicaoPagamento) {
        $dados = DB::table('parcelas')->where('id_condpg', $idCondicaoPagamento)->get();

        $parcelas = array();

        foreach ($dados as $dadosParcela) {
            $parcela = $this->daoParcela->create(get_object_vars($dadosParcela));
            array_push($parcelas, $parcela);
        }

        return $parcelas;
    }

    public function store($condicaoPagamento){
        DB::beginTransaction();
        try {
            $dados = $this->getData($condicaoPagamento);
            DB::table('condicao_pg')->insert($dados);
           /*
            if($condicaoPagamento->getTotalParcelas() > 0){
             $idCondicaoPagamento = DB::getPdo()->lastInsertId();
             $teste = $this->salvarParcelas($condicaoPagamento->getParcelas(), $idCondicaoPagamento); 
            }
         */
           $idCondicaoPagamento = DB::getPdo()->lastInsertId();
           $teste = $this->salvarParcelas($condicaoPagamento->getParcelas(), $idCondicaoPagamento);             
           
            DB::commit();            
            return $teste;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
        

    }

    public function update(Request $request){

    }

    public function delete($id){

    }

    public function findById(int $id, bool $model = false){


    }

    public function getdata(CondicaoPagamento $condicaoPagamento){
        $dados = [
            "id"                 => $condicaoPagamento->getid(),
            "condicao_pagamento" => $condicaoPagamento->getCondicaoPagamento(),
            "juros"              =>  $condicaoPagamento->getJuros(),
            "multa"              =>  $condicaoPagamento->getMulta(),
            "desconto"           =>  $condicaoPagamento->getDesconto(),
            //'data_create' => 
            //'data_alt' => 
        ];

        return $dados;
    }

    public function buscar(bool $model = false){
        $itens = DB:: select(
            'SELECT * FROM condicao_pg ORDER BY id DESC LIMIT 1');       
            $condicaopagamentos = array();
            foreach($itens as $item){
                $condicaopagamento = $this->create(get_object_vars($item));
                array_push($condicaopagamentos, $condicaopagamento);
            }
    
            return $condicaopagamentos;

    }

    public function listCondicaoPagamento(){

        $itens = DB:: select('select * from condicao_pg');
        $listcondicao = array();
        foreach($itens as $item){                           
            array_push($listcondicao, $item);
        }    
        
        return $listcondicao;
    }



}