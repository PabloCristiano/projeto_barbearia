<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Dao\DaoProfissional;
use Illuminate\Support\Facades\Response;

class ControllerProfissional extends Controller
{
    private $daoProfissional;

    public function __construct(){

        $this->daoProfissional = new DaoProfissional;
        
    }

    public function index()
    {
        $profissionais = $this->daoProfissional->all(true);
        
        return view('profissionais.index', compact('profissionais'));
    }

    
    public function create(){}
    //carrega autocomplete
    public function searchProfissional(Request $request){
         $search = $this->daoProfissional->searchProfissional($request->search);
        if($search){
            return response()->json($search);
        }        
        return response()->json('error');
    }

   
    public function store(Request $request){
        $dados = [
            'id'               =>$request->id,
            'profissional'     =>$request->profissional,
            'apelido'          =>$request->apelido,  
            'cpf'              =>$request->cpf,
            'rg'               =>$request->rg,
            'dataNasc'         =>$request->dataNasc,
            'logradouro'       =>$request->logradouro,
            'numero'           =>$request->numero,
            'complemento'      =>$request->complemento,
            'bairro'           =>$request->bairro,
            'cep'              =>$request->cep,
            'id_cidade'        =>$request->id_cidade,
            'id_servico'       =>$request->id_servico,
            'whatsapp'         =>$request->whatsapp,
            'telefone'         =>$request->telefone,
            'email'            =>$request->email,
            'senha'            =>$request->senha,
            'confSenha'        =>$request->confSenha,
            'tipoProf'         =>$request->tipoProf,
            'comissao'         =>$request->comissao,             
          ];
        $profissionais = $this->daoProfissional->create($dados);
        $store = $this->daoProfissional->store($profissionais);
       if($store){
        return redirect('/profissional')->with('Cadastrado', 'show');  
       }
       
        
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit(Request $request){

        $profissional = $this->daoProfissional->searchProfissional($request->id);
        if ($profissional){
            return response::json(array('success' => true, 'data' => $profissional));
        }
        return response::json(array('success' => false, 'data' => 'Deu Ruim'));
        
    }

    
    public function update(Request $request){
        $dados = [
            'id'               =>$request->id,
            'profissional'     =>$request->profissional,
            'apelido'          =>$request->apelido,  
            'cpf'              =>$request->cpf,
            'rg'               =>$request->rg,
            'dataNasc'         =>$request->dataNasc,
            'logradouro'       =>$request->logradouro,
            'numero'           =>$request->numero,
            'complemento'      =>$request->complemento,
            'bairro'           =>$request->bairro,
            'cep'              =>$request->cep,
            'id_cidade'        =>$request->id_cidade,
            'id_servico'       =>$request->id_servico,
            'whatsapp'         =>$request->whatsapp,
            'telefone'         =>$request->telefone,
            'email'            =>$request->email,
            'senha'            =>$request->senha,
            'confSenha'        =>$request->confSenha,
            'tipoProf'         =>$request->tipoProf,
            'comissao'         =>$request->comissao,             
          ];        
        $update = $this->daoProfissional->updateProfissional($dados);
        
        if($update){            
           return redirect('/profissional') ->with('alterado','show');
        }
        
        return redirect('/profissional')->with('no',' ');
    
    }

    
    public function destroy($id){
        $delete = $this->daoProfissional->delete($id);
        if ($delete){
            return redirect('/profissional')->with('excluido', 'Registro removido com sucesso!');
        }

        return redirect('/profissional')->with('no', 'Este registro não pode ser removido.');
    }

    public function showProfissional(){
        $profissionais = $this->daoProfissional->showProfissional();
        return $profissionais;

    }

    public function findByIdCpf(Request $request){
        $profissional = $this->daoProfissional->findByIdCpf($request->cpf);
        if ($profissional){
            return response::json(array('success' => true, 'data' => $profissional));
        }
        return response::json(array('success' => false, 'message' => 'Deu Ruim'));
    }
}
