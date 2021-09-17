<?php

namespace App\Http\Dao;
use App\Http\Dao\Dao;
use App\Http\Dao\DaoCidade;
use App\Http\Dao\DaoCondicaoPagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

Use App\Http\Models\Cliente;

class DaoCliente implements Dao{
    private DaoCidade $daoCidade;
    private DaoCondicaoPagamento $daoCondicaoPagamento;

    public function __construct(){
        $this->daoCidade = new DaoCidade();
        $this->daoCondicaoPagamento = new DaoCondicaoPagamento();
        
    }
    
    public function all(bool $model = false){
        $itens = DB :: select(
            'select * from clientes'
        );
        $clientes = array();
        foreach($itens as $item){
            $cliente = $this->create(get_object_vars($item));
            array_push($clientes,$cliente);
        }

        return $clientes;

    }

    public function create(array $dados){
        $cliente = new Cliente;

        if(isset($dados["id"])){
            $cliente->setid($dados["id"]);
             //$cliente->setDataCadastro($dados["data_create"] ?? null );
            //$cliente->setDataAlteracao($dados["data_alt"] ?? null);
        }

        $cliente->setNome($dados["cliente"]);
        $cliente->setApelido($dados["apelido"]);
        $cliente->setCpf($dados["cpf"]);
        $cliente->setRg($dados["rg"]);
        $cliente->setDataNasc($dados["dataNasc"]);
        $cliente->setLogradouro($dados["logradouro"]);
        $cliente->setNumero($dados["numero"]);
        $cliente->setComplemento($dados["complemento"]);
        $cliente->setBairro($dados["bairro"]);
        $cliente->setCep($dados["cep"]);
        $cliente->setWhatsapp($dados["whatsapp"]);
        $cliente->setTelefone($dados["telefone"]);
        $cliente->setEmail($dados["email"]);
        $cliente->setSenha($dados["senha"]);
        $cliente->setConfSenha($dados["confSenha"]);
        $cliente->setTelefone($dados["telefone"]);
        // $cliente->setObservacoes($dados["observacao"]);
        $cidade =  $this->daoCidade->findById($dados["id_cidade"], true);
        $cliente->setCidade($cidade);
        //$condicaoPagamento =  $this->daoCondicaoPagamento->findById($dados["id_condicao"], true);
        //$cliente->setCondicaoPagamento($condicaoPagamento);

        return $cliente;
        

        

    }

    public function store($obj){
        
        $dados = $this->getData($obj);
         DB::beginTransaction();
         try {
             DB::table('clientes')->insert($dados);
             DB::commit();
             return true;
         } catch (\Exception $e) {
             DB::rollBack();
             dd($e);
             return $e;
         }

    }

    public function update(Request $request){
        try {
            $clientes = $this->create($request->all());
            $dados = $this->getData($clientes);
            DB::table('clientes')->where('id', $dados['id'])->update($dados);
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
            DB::table('clientes')->delete($id);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }

    }

    public function findById(int $id, bool $model = false){

        if (!$model) {
            return DB::select('select * from clientes where id =?',[$id]);
        }

         $dados = DB::table('clientes')->where('id', $id)->first();

        if ($dados)
            return $this->create(get_object_vars($dados));

        return $dados;

    }

    public function getData(Cliente $cliente) {

        $dados = [
          'id' =>            $cliente->getid(),
          'cliente' =>       $cliente->getNome(),
          'apelido'=>        $cliente->getApelido(),
          'cpf'=>            $cliente->getCpf(),
          'rg'=>             $cliente->getRg(),
          'dataNasc' =>      $cliente->getDataNasc(),
          'logradouro'=>     $cliente->getLogradouro(),
          'numero'=>         $cliente->getNumero(),
          'complemento'=>    $cliente->getComplemento(),
          'bairro'=>         $cliente->getBairro(),
          'cep'=>            $cliente->getCep(),
          'id_cidade'=>      $cliente->getCidade()->getId(),
          'whatsapp'=>       $cliente->getWhatsapp(),
          'telefone'=>       $cliente->getTelefone(),
          'email'=>          $cliente->getEmail(),
          'senha' =>         $cliente->getSenha(),
          'confSenha' =>     $cliente->getConfSenha(),        
         // 'id_condicaopg'=>  $cliente->getCondicaoPagamento(),
          'id_condicao'=>  '1', 
        //   'observacao'=>     $cliente->getObservacoes(),
          //'data_create'=>  $cliente->getComissao(),
          //'data_alt'=>     $cliente->getComissao(),
           
        ];

        return $dados;
    }

    public function pesquisar($cliente){       
        $itens = DB:: select('select * from clientes where cliente = ?',[$cliente]);
        $clientes = array();
        foreach($itens as $item){                           
            array_push($clientes, $item);
        }    
        return $clientes;       
    }

    public function showClientes(){

        $itens = DB:: select('select * from clientes');
        $listClientes = array();
        foreach($itens as $item){                           
            array_push($listClientes, $item);
        }    
        
        return $listClientes;
    }



}