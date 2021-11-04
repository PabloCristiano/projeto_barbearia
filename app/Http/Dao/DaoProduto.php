<?php

namespace App\Http\Dao;
use App\Http\Dao\Dao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Models\Produto;
use App\Http\Dao\DaoFornecedor;
Use App\Http\Dao\DaoCategoria;

class DaoProduto implements Dao {

    private DaoFornecedor $daoFornecedor;
    private DaoCategoria  $daoCategoria;

    public function __construct(){

        $this->daoFornecedor = new DaoFornecedor();
        $this->daoCategoria  = new DaoCategoria();
        
    }


    public function all(bool $model = false){

        $itens = DB:: select(
            'select p.id, 
            p.produto,
            p.unidade,
            p.id_categoria, 
            c.categoria,
            p.id_fornecedor,
            f.razaoSocial, 
            p.qtdEstoque, 
            p.precoCusto, 
            p.precoVenda, 
            p.custoUltCompra,
            p.dataUltCompra, 
            p.dataUltVenda, 
            p.data_create, 
            p.data_alt
            from produtos as p join categorias as c
            on p.id_categoria = c.id
			join fornecedores as f on p.id_fornecedor = f.id');

            $produtos = array();
            foreach($itens as $item){
                $produto = $this->create(get_object_vars($item));
                array_push($produtos, $produto);
            }
    
            return $produtos;

    }

    public function create(array $dados){
        $produto = new Produto;

        if(isset($dados["id"])){
            $produto->setId($dados["id"]);
            $produto->setDataCadastro($dados["data_create"] ?? null );
            $produto->setDataAlteracao($dados["data_alt"] ?? null);
        }
        $produto->setProduto($dados["produto"]);
        $produto->setUnidade($dados["unidade"]);
        $produto->setQtdEstoque((int)$dados["qtdEstoque"]);
        $produto->setPrecoCusto((float)$dados["precoCusto"]);
        $produto->setPrecoVenda((float)$dados["precoVenda"]);
        $produto->setCustoUltCompra((float)$dados["custoUltCompra"]);
        $produto->setDataUltCompra($dados["dataUltCompra"]);
        $produto->setDataUltVenda($dados["dataUltVenda"]);
        $categoria = $this->daoCategoria->findById($dados["id_categoria"], true);
        $produto->setCategoria($categoria);
        $fornecedor = $this->daoFornecedor->findById($dados["id_fornecedor"], true);
        $produto->setFornecedor($fornecedor);
        return $produto;
    }

    public function store($obj){               
        $dados = $this->getData($obj);
        DB::beginTransaction();
        try {
            DB::table('produtos')->insert($dados);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return false;
        }
    }

    public function update(Request $request){
        $dado = [
            "id"             => $request->id, 
            "produto"        => $request->produto,
            "unidade"        => $request->unidade,
            "id_categoria"   => $request->id_categoria, 
            "id_fornecedor"  => $request->id_fornecedor, 
            "qtdEstoque"     => $request->qtdEstoque, 
            "precoCusto"     => $request->precoCusto, 
            "precoVenda"     => $request->precoVenda, 
            "custoUltCompra" => $request->custoUltCompra,
            "dataUltCompra"  => $request->dataUltCompra, 
            "dataUltVenda"   => $request->dataUltVenda,
        ];       
        try {
            $produto = $this->create($dado);
            $dados = $this->getData($produto);
            DB::table('produtos')->where('id', $dados['id'])->update($dados);
            // DB::select('UPDATE PRODUTOS SET produto =?',[$dados['produto']],'WHERE id =?',[$dados["id"]]);
            // DB::select('UPDATE PRODUTOS SET unidade =?',[$dados['unidade']],'WHERE id =?',[$dados["id"]]);
            // DB::select('UPDATE PRODUTOS SET id_categoria =?',[$dados['id_categoria']],'WHERE id =?',[$dados["id"]]);
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
            DB::table('produtos')->delete($id);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            return false;
        }

    }

    public function findById(int $id, bool $model = false){
        
    }

    public function getData(Produto $produto) {
        $dados = [
            "id"             => $produto->getid(), 
            "produto"        => $produto->getProduto(),
            "unidade"        => $produto->getUnidade(),
            "id_categoria"   => $produto->getCategoria()->getid(), 
            "id_fornecedor"  => $produto->getFornecedor()->getid(), 
            "qtdEstoque"     => $produto->getQtdEstoque(), 
            "precoCusto"     => $produto->getPrecoCusto(), 
            "precoVenda"     => $produto->getPrecoVenda(), 
            "custoUltCompra" => $produto->getCustoUltCompra(),
            "dataUltCompra"  => $produto->getDataUltCompra(), 
            "dataUltVenda"   => $produto->getDataUltVenda(),
             "data_alt"       => Carbon::now(),
        ];
        return $dados;
    }

    public function showProduto(){
        $itens = DB:: select('select p.id,p.produto, p.unidade,p.id_fornecedor, f.razaoSocial, p.id_categoria, c.categoria, p.qtdEstoque, p.precoVenda,  p.precoCusto from produtos as p
        join categorias c on c.id = p.id_categoria
        join fornecedores f on f.id = p.id_fornecedor ');
        $listProdutos = array();
        foreach($itens as $item){                           
            array_push($listProdutos, $item);
        }    
        return $listProdutos;
    }
}