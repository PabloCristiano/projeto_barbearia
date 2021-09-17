<?php

namespace App\Http\Dao;
use App\Http\Dao\Dao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Categoria;
use Carbon\Carbon;


class DaoCategoria implements Dao {

    public function all(bool $model = false){
        $itens = DB:: select(
            'select id, categoria,data_create, data_alt 
            from categorias');       
            $categorias = array();
            foreach($itens as $item){
                $categoria = $this->create(get_object_vars($item));
                array_push($categorias, $categoria);
            }
    
            return $categorias;
    }

    public function create(array $dados){
        $categoria = new Categoria();
        if(isset($dados["id"])){
            $categoria->setId($dados["id"]);
            $categoria->setDataCadastro($dados["data_cadastro"] ?? null);
            $categoria->setDataAlteracao($dados["data_alteracao"]??null);
        }
        $categoria->setCategoria($dados["categoria"]);

        return $categoria;
    }

    public function store($obj){
        $dados = $this->getData($obj);
        DB::beginTransaction();
        try {
            DB::table('categorias')->insert($dados);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }

    }

    public function update(Request $request){
        $categoria = $this->create($request->all());
        $dados = $this->getData($categoria);
        DB::beginTransaction();
        try {
            DB::table('categorias')->where('id', $dados['id'])->update($dados);

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
            DB::table('categorias')->delete($id);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }

    }

    public function findById(int $id, bool $model = false){
        if (!$model) {
            return DB::select('select id, categoria, data_create, data_alt 
            from  categorias
            where id = ?',[$id]);
        }

         $dados = DB::table('categorias')->where('id', $id)->first();

        if ($dados)
            return $this->create(get_object_vars($dados));

        return $dados;


    }

    public function getData(Categoria $categoria) {

        $dados = [
            "id"        => $categoria->getId(),
            "categoria"    => $categoria->getCategoria(),
        ];

        return $dados;
    }

    public function showcategoria(){
        $itens = DB:: select(
            'select id, categoria,data_create, data_alt 
            from categorias');        
            $categorias = array();
            foreach($itens as $item){
                $categoria = $this->create(get_object_vars($item));                
                array_push($categorias, $item);                
            }
            
            return $categorias;
            
    }







}
