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
            $parcela->setDataCadastro($dados["data_create"]?? null);
            $parcela->setDataAlteracao($dados["data_alt"]?? null);
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

    public function updateParcela(array $par, $qtd, $id){
        //dd($par,$qtd, $id);
        DB::beginTransaction();
        try {
            for ($i = 0; $i < $qtd; $i++) {
                $dadosParcela = [
                    'parcela'                => $par[$i]["parcela"],
                    'prazo'                  => $par[$i]["prazo"],
                    'porcentagem'            => $par[$i]["porcentagem"],
                    'idformapg'             => $par[$i]["idformapg"],
                    'idcondpg'              => $id,
                ];
                DB::select('UPDATE parcelas SET idformapg =?',[$dadosParcela['idformapg']],
                'WHERE parcelas.parcela =?',[$dadosParcela["parcela"]], 'AND parcelas.idcondpg?',$id );            
                DB::select('UPDATE parcelas SET porcentagem =?',[$dadosParcela['porcentagem']],
                'WHERE parcelas.parcela =?',[$dadosParcela["parcela"]], 'AND parcelas.idcondpg?',$id );            
                
            }
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            return $th;
        }
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
            'data_create'        =>  $parcela->getDataCadastro(),
            'data_alt'           =>  $parcela->getDataAlteracao(),
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
                "id_formapg"         => $parcelas[$i]["idformapg"],
                "data_create"        => $parcelas[$i]["data_create"],
                "data_alt"           => $parcelas[$i]["data_alt"],
            ];          
            array_push($par, $dadosParcela);
        }         
        return $par;
    }

   




}