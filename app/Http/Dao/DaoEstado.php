<?php

namespace App\Http\Dao;
use App\Http\Dao\Dao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Dao\DaoPais;
use App\Http\Models\Estado;
use Carbon\Carbon;

class DaoEstado implements Dao{

    public function __construct()
    {
        $this->daoPais = new DaoPais();
    }

    public function all(bool $model = false) {
        $itens = DB:: select(
            'select   e.id, e.estado, e.uf,e.id_pais, 
             p.pais, e.data_create, e.data_alt 
            from estados as e join  paises as p
            on e.id_pais = p.id');        
            $estados = array();
            foreach($itens as $item){
                $estado = $this->create(get_object_vars($item));
                array_push($estados, $estado);
            }    
            return $estados;
    }

    public function create(array $dados) {

        $estado = new Estado();
        if(isset($dados["id"])){
            $estado->setId($dados["id"]);
            $estado->setDataCadastro($dados["data_create"] ?? null);
            $estado->setDataAlteracao($dados["data_alt"] ?? null);
        }
        $estado->setEstado($dados["estado"]);
        $estado->setUF($dados["uf"]);
        $pais = $this->daoPais->findById($dados["id_pais"],true);
        $estado->setPais($pais);
        return $estado;
        
        
    }
    public function edit(Request $request){
        $estado = new Estado();
        $estado->setId($request->id);
        $estado->setEstado($request->estado);
        $estado->setUF($request->uf);
        $pais = $this->daoPais->findById($request->id_pais,true);
        $estado->setPais($pais);
        $estado->setDataAlteracao();
        return $estado;

    }

    public function store($estado){
        $dados = $this->getData($estado);
        DB::beginTransaction();
        try {
            DB::table('estados')->insert($dados);
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
                $estado = $this->edit($request);
                $dados =$this->getData($estado);
                DB::table('estados')->where('id', $dados['id'])->update($dados);
                DB::commit();
                return true;
            } catch (\Throwable $th) {
                DB::rollBack();
                dd($th->getMessage());
                return false;
            } 
       return $estado;
    }

    public function delete($id){

        DB::beginTransaction();

        try {
            DB::table('estados')->delete($id);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }
        
       
    }

    public function findById(int $id, bool $model = false) {
        if (!$model)
            return DB::table('estados')->get()->where('id', $id)->first();

        $dados = DB::table('estados')->where('id', $id)->first();

        if ($dados)
            return $this->create(get_object_vars($dados));
      
        return $dados;
        
    }

    public function getData(Estado $estado) {
       
        $dados = [
            'id'       => $estado->getId(),
            'estado'   => $estado->getEstado(),
            'uf'       => $estado->getUF(),
            'id_pais'  => $estado->getPais()->getID(),
            'data_alt' => Carbon::now(),
            
        ];
        return $dados;
    }

    public function showestado(){
        $itens = DB:: select(
            'select   e.id, e.estado, e.uf,e.id_pais, 
             p.pais, e.data_create, e.data_alt 
            from estados as e join  paises as p
            on e.id_pais = p.id');        
            $estados = array();
            foreach($itens as $item){               
                array_push($estados, $item);
            }    
            return $estados;

    }

    public function pesquisar($name){       
        $itens = DB:: select('select * from estados where estado = ?',[$name]);
        $estados = array();
        foreach($itens as $item){                           
            array_push($estados, $item);
        }    
        return $estados;       
    }
}