<?php

namespace App\Http\Dao;

use App\Http\Dao\Dao;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Models\Pais;
use Carbon\Carbon;

class DaoPais implements Dao {

    public function all(bool $model = false){
        if (!$model)
            return DB::table('paises')->get();

        $itens = DB::table('paises')->get();

        $paises = array();

        foreach ($itens as $item) {
            $pais = $this->create(get_object_vars($item));
            array_push($paises, $pais);
        }

        return $paises;
        
    }

    public function create(array $dados){
        $pais = new Pais();
        if(isset($dados["id"])){
            $pais->setId($dados["id"]);
            $pais->setDataCadastro($dados["data_create"]?? null);
            $pais->setDataAlteracao($dados["data_alt"]?? null);
        }

        $pais->setPais($dados["pais"]);
        $pais->setSigla($dados["sigla"]);
        $pais->setDDI($dados["ddi"]);
        return $pais;

    }

    public function store($obj){
        
        $dados = $this->getData($obj);
        DB::beginTransaction();

        try {
            DB::table('paises')->insert($dados);
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
            $pais = $this->create($request->all());

            $dados = $this->getData($pais);

            DB::table('paises')->where('id', $dados['id'])->update($dados);

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }

    }

    public function delete($id){
        DB::beginTransaction();
        try {
            DB::table('paises')->where('id',$id)->delete();
            DB::commit();
            return true;
        } catch (QueryException $e) {
            DB::rollBack();
            return false;
        }

    }

    public function findById(int $id, bool $model = false){
        if (!$model)
            return DB::table('paises')->get()->where('id', $id)->first();

        $dados = DB::table('paises')->where('id', $id)->first();

        if ($dados)
            return $this->create(get_object_vars($dados));

        return $dados;

    }

    public function getData( Pais $pais){
        $dados = [
            'id' => $pais->getid(),
            'pais' => $pais->getPais(),
            'sigla' => $pais->getSigla(),
            'ddi' => $pais->getDDI(),
            'data_alt' =>Carbon::now(), 
        ];

        return $dados;

    }

    public function showpais(){
        $itens = DB::table('paises')->get();
        $paises = array();
        foreach ($itens as $item) {
            array_push($paises, $item);
        }
        return $paises;

    }
}