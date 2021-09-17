<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use App\Http\Dao\DaoCidade;
use App\Http\Dao\DaoEstado;
use App\Http\Dao\DaoPais;
use Illuminate\Http\Request;

class ControllerCidade extends Controller{

    private $daoCidade;
    private $daoEstado;
    private $daoPais;
 
    public function __construct(){

       $this->daoEstado = new DaoEstado;
        $this->daoCidade = new DaoCidade;
        $this->daoPais = new DaoPais;
        
    }
    
    public function index()
    {
        $cidades = $this->daoCidade->all(true);
        $estados = $this->daoEstado->all(true);
        $paises = $this->daoPais->all(true);
         return view('cidades.index', compact('estados','cidades','paises'));
    }
   
    public function store(Request $request)
    {
       
       $cidade = $this->daoCidade->create($request->all());
       $store = $this->daoCidade->store($cidade);

       if($store){
        return redirect('/cidade')->with('success', ' ');  
       }

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(Response $response)
    {
        $cidades = $this->daoCidade->showcidade();   
        // return $cidades ;
        return response::json(array('success'=> true,'data'=>$cidades));
    }
    
    public function update(Request $request)
    {
        $update = $this->daoCidade->update($request);
        if($update){
            
        return redirect('/cidade') ->with('success',' ');
        }
        
        return redirect('/cidade')->with('error',' ');
    }

    
    public function destroy($id)
    {
    
        $delete = $this->daoCidade->delete($id);
        if ($delete){
            return redirect('/cidade')->with('success', 'Registro removido com sucesso!');
        }

        return redirect('/cidade')->with('error', 'Este registro não pode ser removido.');
    }

    public function showcidade(){

            $cidades = $this->daoCidade->showcidade();   
            return $cidades ;
         
    }

    public function RegistroCidade( Request $request){
        
        $cidade = $this->daoCidade->create($request->all());
        $store = $this->daoCidade->store($cidade);
        if($store){  
           return response()->json('Cidade adicionado com Sucessoo!!');
        } 
        

    }

}
