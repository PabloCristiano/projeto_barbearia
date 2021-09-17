<?php
namespace App\Http\Dao;
use App\Http\Dao\Dao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Servico;
use Carbon\Carbon;


Class DaoServico implements Dao{

    public function all(bool $model = false){
        $itens = DB:: select(' select id, 
                                     servico, 
                                     tempo, 
                                     valor, 
                                     comissao,
                                     observacoes, 
                                     data_create, 
                                     data_alt  
                                     from servicos'
        );
        $servicos = array();
        foreach($itens as $item){
            $servico = $this->create(get_object_vars($item));
            array_push($servicos, $servico);
        }

        return $servicos;

    }

    public function create(array $dados){

        $servico = new Servico();

        if (isset($dados["id"])) {
            $servico->setId($dados["id"]);
            $servico->setDataCadastro($dados["data_cadastro"] ?? null);
            $servico->setDataAlteracao($dados["data_alteracao"] ?? null);
        }

        $servico->setServico($dados["servico"]);
        $servico->setTempo($dados["tempo"]);
        $servico->setValor($dados["valor"]);
        $servico->setComissao($dados["comissao"]);
        $servico->setObservacoes($dados["observacoes"]);

        return $servico;

    }

    public function store($obj){

        $dados = $this->getData($obj);
        DB::beginTransaction();
        try {
            DB::table('servicos')->insert($dados);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }

    }

    public function update(Request $request){
        try {
            
            $servico = $this->create($request->all());

            $dados = $this->getData($servico);

            DB::table('servicos')->where('id', $dados['id'])->update($dados);

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
            DB::table('servicos')->delete($id);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }

    }

    public function findById(int $id, bool $model = false){

        if (!$model) {
            return DB::select('select id, 
               servico, tempo, valor, comissao,observacoes, 
               data_create, data_alt  from servicos where id =?',[$id]);
        }

         $dados = DB::table('servicos')->where('id', $id)->first();

        if ($dados)
            return $this->create(get_object_vars($dados));

        return $dados;


    }

    public function getData(Servico $servico) {

        $dados = [
            "id"        => $servico->getId(),
            "servico"    => $servico->getServico(),
            "tempo"       => $servico->getTempo(),
            "valor" => $servico->getValor(),
            "comissao" => $servico->getComissao(),
            "observacoes" => $servico->getObservacoes(),
        ];

        return $dados;
    }

    public function showservico(){

        $itens = DB:: select(' select id, 
                                     servico, 
                                     tempo, 
                                     valor, 
                                     comissao,
                                     observacoes, 
                                     data_create, 
                                     data_alt  
                                     from servicos'
        );
        $servicos = array();
        foreach($itens as $item){
            $servico = $this->create(get_object_vars($item));
            array_push($servicos, $item);
        }

        return $servicos;

    }



}