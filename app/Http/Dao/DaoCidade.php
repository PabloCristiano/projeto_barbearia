<?php

namespace App\Http\Dao;
use App\Http\Dao\Dao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Dao\DaoEstado;
use App\Http\Models\Cidade;
use Carbon\Carbon;

Class DaoCidade implements Dao {
    private DaoEstado $daoEstado;

    public function __construct(){
        $this->daoEstado = new DaoEstado();
        
    }

    public function all(bool $model = false){
        $itens = DB:: select(
            'select c.id, c.cidade, c.ddd, c.id_estado, e.estado, c.data_create, c.data_alt 
            from cidades as c join estados as e
            on c.id_estado = e.id');        
            $cidades = array();
            foreach($itens as $item){
                $cidade = $this->create(get_object_vars($item));
                array_push($cidades, $cidade);
            }
    
            return $cidades;


    }

    public function create(array $dados){
        $cidade = new Cidade();

        if (isset($dados["id"])) {
            $cidade->setId($dados["id"]);
            $cidade->setDataCadastro($dados["data_cadastro"] ?? null);
            $cidade->setDataAlteracao($dados["data_alteracao"] ?? null);
        }

        $cidade->setCidade($dados["cidade"]);
        $cidade->setDDD($dados["ddd"]);
        $estado = $this->daoEstado->findById($dados["id_estado"], true);
        $cidade->setEstado($estado);
        return $cidade;

    }

    public function store($obj){

        $dados = $this->getData($obj);
        DB::beginTransaction();
        try {
            DB::table('cidades')->insert($dados);
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

            $dados = array(
                'id'=>$request->id,
                'cidade'=>$request->cidade,
                'ddd'=>$request->ddd,
                'id_estado'=>$request->id_estado,
                'data_alt'=> Carbon::now(),
            );

            DB::table('cidades')->where('id', $dados['id'])->update($dados);

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
            DB::table('cidades')->delete($id);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }

    }

    public function findById(int $id, bool $model = false){
        if (!$model) {
            return DB::select('select c.id, c.cidade, c.ddd, c.id_estado, e.estado, c.data_create, c.data_alt 
            from cidades as c join estados as e
            on c.id_estado = e.id where c.id = ?',[$id]);
        }

         $dados = DB::table('cidades')->where('id', $id)->first();

        if ($dados)
            return $this->create(get_object_vars($dados));

        return $dados;


    }

    public function getData(Cidade $cidade) {

        $dados = [
            "id"        => $cidade->getId(),
            "cidade"    => $cidade->getCidade(),
            "ddd"       => $cidade->getDDD(),
            "id_estado" => $cidade->getEstado()->getID(),
        ];

        return $dados;
    }

    public function showcidade(){
        $itens = DB:: select(
            'select c.id, c.cidade, c.ddd, c.id_estado, e.estado, c.data_create, c.data_alt 
            from cidades as c join estados as e
            on c.id_estado = e.id');        
            $cidades = array();
            foreach($itens as $item){
                $cidade = $this->create(get_object_vars($item));                
                array_push($cidades, $item);                
            }
            return $cidades;
            
    }

}