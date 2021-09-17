<?php

namespace App\Http\Dao;
use App\Http\Dao\Dao;
use App\Http\Models\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Dao\DaoCidade;
use App\Http\Dao\DaoCondicaoPagamento;
use Carbon\Carbon;
use PhpParser\Node\Expr\FuncCall;

class DaoFornecedor implements Dao {

    private DaoCidade $daoCidade;
    private DaoCondicaoPagamento $daoCondicaoPagamento;

    public function __construct(){
        $this->daoCidade = new DaoCidade();
        $this->daoCondicaoPagamento = new DaoCondicaoPagamento();
        
    }

    public function all(bool $model = false){
        $itens = DB:: select(
            'select id ,
            tipo_pessoa,
            razaoSocial,
            nomefantasia,
            apelido,
            logradouro,
            numero,
            complemento,
            bairro,
            cep,
            id_cidade,
            whatsapp,
            telefone,
            email,
            pagSite,
            contato,
            cnpj,
            ie,
            cpf,
            rg,
            id_condicaopg,
            limiteCredito,
            obs,
            data_create,
            data_alt  
            from fornecedores');

            $fornecedores = array();
            foreach($itens as $item){
                $fornecedor = $this->create(get_object_vars($item));
                array_push($fornecedores, $fornecedor);
            }
    
            return $fornecedores;


    }

    public function create(array $dados){

        $fornecedor = new Fornecedor();

        if(isset($dados["id"])){
            $fornecedor->setId($dados["id"]);
            //$fornecedor->setDataCadastro($dados["data_create"] ?? null );
            //$fornecedor->setDataAlteracao($dados["data_alt"] ?? null);
        }
        $fornecedor->setTipoPessoa((string)$dados["tipo_pessoa"]);
        $fornecedor->setRazaoSocial((string)$dados["razaoSocial"]);
        $fornecedor->setNomeFantasia((string)$dados["nomefantasia"]);
        //$fornecedor->setNome((string)$dados["apelido"]);
        $fornecedor->setLogradouro((string)$dados["logradouro"]);
        $fornecedor->setNumero((string)$dados["numero"]);
        $fornecedor->setComplemento((string)$dados["complemento"]);
        $fornecedor->setBairro((string)$dados["bairro"]);
        $fornecedor->setCep((string)$dados["cep"]);
        $fornecedor->setWhatsapp((string)$dados["whatsapp"]);
        $fornecedor->setTelefone((string)$dados["telefone"]);
        $fornecedor->setEmail((string)$dados["email"]);
        $fornecedor->setPagSite((string)$dados["pagSite"]);
        $fornecedor->setContato((string)$dados["contato"]);
        if(isset($dados["cnpj"])){$fornecedor->setCnpj((string)$dados["cnpj"]);}
        if(isset($dados["cnpj"])){$fornecedor->setInscricaoEstadual((string) $dados["ie"]);}
        if(isset($dados["cpf"])){$fornecedor->setCpf((string) $dados["cpf"]);}
        if(isset($dados["rg"])){$fornecedor->setRg((string) $dados["rg"]);}
        $fornecedor->setLimiteCredito((float) $dados["limiteCredito"]);
        $fornecedor->setObservacoes((string) $dados["obs"]);
        $cidade = $this->daoCidade->findById($dados["id_cidade"], true);
        $fornecedor->setCidade($cidade);        
        return $fornecedor;
    }

    public function store($obj){

        $dados = $this->getData($obj);
       // dd($dados);
        DB::beginTransaction();
        try {
            DB::table('fornecedores')->insert($dados);
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
            $fornecedores = $this->create($request->all());
            $dados = $this->getData($fornecedores);
            DB::table('fornecedores')->where('id', $dados['id'])->update($dados);
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
            DB::table('fornecedores')->delete($id);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }

    }

    public function findById(int $id, bool $model = false){

        if (!$model) {
            return DB::select('select f.id , f.tipo_pessoa, f.razaoSocial, f.nomefantasia, f.apelido, f.logradouro, f.numero, f.complemento, 
            f.bairro, f.cep, f.id_cidade, f.whatsapp, f.telefone, f.email, f.pagSite, f.contato, f.cnpj, f.ie, f.cpf, f.rg, f.id_condicaopg,
            f.limiteCredito, f.obs, f.data_create, f.data_alt  
            from fornecedores as f
            join cidades as c on f.id_cidade = c.id
            join condicao_pg as co on f.id_condicaopg = co.id where f.id = ?',[$id]);
        }

         $dados = DB::table('fornecedores')->where('id', $id)->first();

        if ($dados)
            return $this->create(get_object_vars($dados));

        return $dados;
        

    }

    public function getData(Fornecedor $Fornecedor) {

        $dados = [
          'id' =>            $Fornecedor->getid(),
          'tipo_pessoa'=>    $Fornecedor->getTipoPessoa(),
          'razaoSocial'=>    $Fornecedor->getRazaoSocial(),  
          'nomeFantasia'=>   $Fornecedor->getNomeFantasia(),
          'apelido'=>        $Fornecedor->getNome(),
          'logradouro'=>     $Fornecedor->getLogradouro(),
          'numero'=>         $Fornecedor->getNumero(),
          'complemento'=>    $Fornecedor->getComplemento(),
          'bairro'=>         $Fornecedor->getBairro(),
          'cep'=>            $Fornecedor->getCep(),
          'id_cidade'=>      $Fornecedor->getCidade()->getId(),
          'whatsapp'=>       $Fornecedor->getWhatsapp(),
          'telefone'=>       $Fornecedor->getTelefone(),
          'email'=>          $Fornecedor->getEmail(),
          'pagSite'=>        $Fornecedor->getPagSite(),
          'contato'=>        $Fornecedor->getContato(),
          'cnpj'=>           $Fornecedor->getCnpj(),
          'ie'=>             $Fornecedor->getInscricaoEstadual(),
          'cpf'=>            $Fornecedor->getCpf(),
          'rg'=>             $Fornecedor->getRg(),
         // 'id_condicaopg'=>  $Fornecedor->getCondicaoPagamento(),
          'id_condicaopg'=>  '1', 
          'limiteCredito'=>  $Fornecedor->getLimiteCredito(),
          'obs'=>            $Fornecedor->getObservacoes(),
          //'data_create'=>  $Fornecedor->getComissao(),
          //'data_alt'=>     $Fornecedor->getComissao(),
           
        ];

        return $dados;
    }

    public function showFornecedor(){
        $itens = DB:: select(
            'select id ,
            tipo_pessoa,
            razaoSocial,
            nomefantasia,
            apelido,
            logradouro,
            numero,
            complemento,
            bairro,
            cep,
            id_cidade,
            whatsapp,
            telefone,
            email,
            pagSite,
            contato,
            cnpj,
            ie,
            cpf,
            rg,
            id_condicaopg,
            limiteCredito,
            obs,
            data_create,
            data_alt  
            from fornecedores'
           );        
            $fornecedores = array();
            foreach($itens as $item){                
                array_push($fornecedores, $item);                
            }
            
            return $fornecedores;
            
    }

    public function registroFornecedor(Request $request){
      $dados = [
        'id' => $request->id,
        'tipo_pessoa'=> $request->tipo_pessoa,
        'razaoSocial'=> $request->razaoSocial,
        'nomefantasia'=> $request->nomefantasia,
        'logradouro' => $request->logradouro,
        'numero' => $request->numero,
        'complemento' => $request->complemento,
        'bairro' => $request->bairro,
        'cep' => $request->cep,
        'id_cidade' => $request->id_cidade,
        'whatsapp' => $request->whatsapp,
        'telefone' => $request->telefone,
        'email' => $request->email,
        'pagSite' => $request->pagSite,
        'contato' => $request->contato,
        'cnpj' => $request->cnpj,
        'ie'=> $request->ie,
        'cpf' => $request->cpf,
        'rg' => $request->rg,
        'id_condicaopg' => $request->id_condicaopg,
        'limitecredito' => $request->limitecredito,
        'obs' => $request->obs
      ];
        DB::beginTransaction();
        try {
            DB::table('fornecedores')->insert($dados);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }


    }



}