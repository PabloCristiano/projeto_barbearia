<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Dao\DaoProduto;
use App\Http\Dao\DaoCategoria;
use App\Http\Dao\DaoFornecedor;


class ControllerProduto extends Controller{

    private $daoProduto;
    private $daoCategoria;
    private $daoFornecedor;

    public function __construct(){

        $this->daoProduto = new DaoProduto;
        $this->daoCategoria = new DaoCategoria;
        $this->daoFornecedor = new DaoFornecedor;
        
    }
    
    public function index(){
        $produtos = $this->daoProduto->all(true);
        $categorias = $this->daoCategoria->all(true);
        $fornecedores = $this->daoFornecedor->all(true);
        return view('produtos.index', compact('produtos','categorias','fornecedores'));
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request){
        $produto = $this->daoProduto->create($request->all());
        $store = $this->daoProduto->store($produto);
        if($store){
            return redirect('/produto')->with('Cadastrado', 'show');  
           }
    }

 
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request){
     
      $update =  $this->daoProduto->update($request);
      if($update){            
        return redirect('/produto') ->with('alterado','show');
    }
        return redirect('/produto')->with('error',' ');


    }

    public function destroy($id){
        $delete = $this->daoProduto->delete($id);
        if ($delete){
            return redirect('/produto')->with('excluido', 'show');
        }

        return redirect('/produto')->with('errorExcluido', 'show');
        
    }

    public function showProduto(){
        $listProdutos = $this->daoProduto->showProduto();
        return $listProdutos;
    }
}
