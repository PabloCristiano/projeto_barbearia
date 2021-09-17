<?php

namespace App\Http\Dao;

use App\Http\Dao\Dao;
use App\Http\Models\FormaPagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class DaoFormaPagamento implements Dao {

    public function all(bool $model = false){
        $itens = DB:: select(
            'select * from forma_pg'

        );
        $formaspg = array();
        foreach($itens as $item){
            $formapg = $this->create(get_object_vars($item));
            array_push($formaspg, $formapg);
        }

            return $formaspg;
    }

    public function create(array $dados){
        $formapg = new FormaPagamento();

        if(isset($dados["id"])){
            $formapg->setId($dados["id"]);
            $formapg->setDataCadastro($dados["dataCadastro"]?? null);
            $formapg->setDataAlteracao($dados["dataAleracao"]?? null);
        }

        $formapg->setFormapg($dados["forma_pg"]);

        return $formapg;

    }

    public function store($obj){
        $dados = $this->getData($obj);
        DB::beginTransaction();
        try {
            DB::table('forma_pg')->insert($dados);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }


    }

    public function update(Request $request){

        
        DB::beginTransaction();
        try {
            $formapg = $this->create($request->all());
            $dados = $this->getData($formapg);
            DB::table('forma_pg')->where('id', $dados["id"])->update($dados);

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            return false;
        }

    }

    public function delete($id){
        DB::beginTransaction();

        try {
            DB::table('forma_pg')->delete($id);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }

    }

    public function findById(int $id, bool $model = false){

        if (!$model)
            return DB::table('forma_pg')->get()->where('id', $id)->first();

        $dados = DB::table('forma_pg')->where('id', $id)->first();

        if ($dados)
            return $this->create(get_object_vars($dados));

        return $dados;

    }

    public function getData( Formapagamento $formapg){
        $dados = [
            'id' => $formapg->getid(),
            'forma_pg' => $formapg->getFormapg(),
            'data_alt' =>Carbon::now(), 
        ];

        return $dados;

    }

    public function showformapagamento(){
        $itens = DB::table('forma_pg')->get();
        $formapg = array();
        foreach ($itens as $item) {
            array_push($formapg, $item);
        }
        return $formapg;

    }



}