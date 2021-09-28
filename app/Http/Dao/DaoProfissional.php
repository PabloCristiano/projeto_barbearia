<?php

namespace App\Http\Dao;
use App\Http\Dao\Dao;
use App\Http\Models\Profissional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Dao\DaoCidade;
use App\Http\Dao\DaoServico; 
use Carbon\Carbon;


class DaoProfissional implements Dao {
    private DaoCidade $daoCidade;
    private DaoServico $daoServico;

    public function __construct(){
        $this->daoCidade = new DaoCidade();
        $this->daoServico = new DaoServico();
        
    }

    public function all(bool $model = false){

        $itens = DB:: select(
            'select id, 
            profissional, 
            apelido, 
            cpf, 
            rg, 
            dataNasc, 
            logradouro, 
            numero, 
            complemento, 
            bairro, 
            cep, 
            id_cidade, 
            whatsapp, 
            telefone, 
            email, 
            senha, 
            confSenha, 
            tipoProf, 
            id_servico, 
            comissao, 
            data_create, 
            data_alt  
            from profissionais');

            $profissionais = array();
            foreach($itens as $item){
                $profissional = $this->create(get_object_vars($item));
                array_push($profissionais, $profissional);
            }
    
            return $profissionais;

    }

    public function create(array $dados){
        $profissional = new Profissional();

        if(isset($dados["id"])){
            $profissional->setId($dados["id"]);
            $profissional->setDataCadastro($dados["data_create"] ?? null );
            $profissional->setDataAlteracao($dados["data_alt"] ?? null);
        }
        $profissional->setNome((string)$dados["profissional"]);
        $profissional->setApelido((string)$dados["apelido"]);
        $profissional->setCpf((string)$dados["cpf"]);
        $profissional->setRg((string)$dados["rg"]);
        $profissional->setDataNasc((string)$dados["dataNasc"]);
        $profissional->setLogradouro((string)$dados["logradouro"]);
        $profissional->setNumero((string)$dados["numero"]);
        $profissional->setComplemento((string)$dados["complemento"]);
        $profissional->setBairro((string)$dados["bairro"]);
        $profissional->setCep((string)$dados["cep"]);
        $profissional->setWhatsapp((string)$dados["whatsapp"]);
        $profissional->setTelefone((string)$dados["telefone"]);
        $profissional->setEmail((string)$dados["email"]);
        $profissional->setSenha((string)$dados["senha"]);
        $profissional->setConfSenha((string)$dados["confSenha"]);
        $profissional->setComissao((float) $dados["comissao"]);
        $cidade = $this->daoCidade->findById($dados["id_cidade"], true);
        $profissional->setCidade($cidade);
        $servico = $this->daoServico->findById($dados["id_servico"], true);
        $profissional->setServico($servico);

        
        return $profissional;

    }

    public function store($obj){

        $dados = $this->getData($obj);
       // dd($dados);
        DB::beginTransaction();
        try {
            DB::table('profissionais')->insert($dados);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return $e;
        }


    }
    public function updateProfissional(array $dados){
        try {
            $profissional = $this->create($dados);
            $dados = $this->getData($profissional);
            DB::table('profissionais')->where('id', $dados['id'])->update($dados);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
            return false;
        }

    }
    public function update(Request $request){ 
        try {
            $profissional = $this->create($request->all());
            $dados = $this->getData($profissional);
            DB::table('profissionais')->where('id', $dados['id'])->update($dados);
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
            DB::table('profissionais')->delete($id);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }

    }

    public function findById(int $id, bool $model = false){
        
    }

    public function getData(Profissional $profissional) {

        $dados = [
          'id' =>          $profissional->getid(),
          'profissional'=> $profissional->getNome(),
          'apelido'=>      $profissional->getApelido(),  
          'cpf'=>          $profissional->getCpf(),
          'rg'=>           $profissional->getRg(),
          'dataNasc'=>     $profissional->getDataNasc(),
          'logradouro'=>   $profissional->getLogradouro(),
          'numero'=>       $profissional->getNumero(),
          'complemento'=>  $profissional->getComplemento(),
          'bairro'=>       $profissional->getBairro(),
          'cep'=>          $profissional->getCep(),
          'id_cidade'=>    $profissional->getCidade()->getId(),
          'id_servico'=>   $profissional->getServico()->getId(),
          'whatsapp'=>     $profissional->getWhatsapp(),
          'telefone'=>     $profissional->getTelefone(),
          'email'=>        $profissional->getEmail(),
          'senha'=>        $profissional->getSenha(),
          'confSenha'=>    $profissional->getConfSenha(),
          'tipoProf'=>     $profissional->getTipoProf(),
          'comissao'=>     $profissional->getComissao(),
          'data_alt'=>     Carbon::now(),           
        ];

        return $dados;
    }

    public function showProfissional(){

        $itens = DB:: select(' select id, profissional from profissionais'
        );
        $profissionais = array();
        foreach($itens as $item){
            array_push($profissionais, $item);
        }
        return $profissionais;

    }
    public function searchProfissional($id){       
        $itens = DB:: select('select * from profissionais where id = ?',[$id]);
        $profissional = Array();
        foreach($itens as $item){                           
            array_push($profissional, $item);
        }    
        return $profissional;       
    }




}