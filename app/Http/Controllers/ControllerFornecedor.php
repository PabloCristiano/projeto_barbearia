<?php

namespace App\Http\Controllers;
use App\Http\Dao\DaoFornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ControllerFornecedor extends Controller{

    private $daoFornecedor;

    public function __construct(){

        $this->daoFornecedor = new DaoFornecedor;
        
    }
    
    public function index(){
        $fonecedores = $this->daoFornecedor->all(true);
       return view('fornecedores.index', compact('fonecedores'));
    }

    
    public function create(){
        
    }

   
    public function store(Request $request){
        //dd($request);
        $fonecedores = $this->daoFornecedor->create($request->all());
        $store = $this->daoFornecedor->store($fonecedores);
       //dd($store);
       if($store){
        return redirect('/fornecedor')->with('success', ' ');  
       }

    }

   
    public function show($id)
    {
       
    }

   
    public function edit($id)
    {
        
    }

    
    public function update(Request $request){
       // dd($request);
        $update = $this->daoFornecedor->update($request);
        //dd($update);
        if($update){            
           return redirect('/fornecedor') ->with('success',' ');
        }
        
        return redirect('/fornecedor')->with('error',' ');
        
    }

    
    public function destroy($id){
       // dd($id);
        $delete = $this->daoFornecedor->delete($id);
        //dd($delete);
        if ($delete){
            return redirect('/fornecedor')->with('success', 'Registro removido com sucesso!');
        }

        return redirect('/fornecedor')->with('error', 'Este registro não pode ser removido.');
      
    }
   
    public function showFornecedor(){

        $fornecedor = $this->daoFornecedor->showFornecedor();   
        return $fornecedor ;
    }

    public function RegistroFornecedor( Request $request){ 
        //$dados = $request->all();       
       
       $store = $this->daoFornecedor->registroFornecedor($request);
        if($store){  
            return response::json(array('success'=> true,'data'=>$store));
        } 
        

    }


}
