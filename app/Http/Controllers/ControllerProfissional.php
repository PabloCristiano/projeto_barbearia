<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Dao\DaoProfissional;

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

    public function searchProfissional(Request $request){
         $search = $this->daoProfissional->searchProfissional($request->search);
        if($search){
            return response()->json($search);
        }        
        return response()->json('error');
    }

   
    public function store(Request $request){
        $profissionais = $this->daoProfissional->create($request->all());
        $store = $this->daoProfissional->store($profissionais);
       if($store){
        return redirect('/profissional')->with('success', ' ');  
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
        
        $update = $this->daoProfissional->update($request);
        
        if($update){            
           return redirect('/profissional') ->with('success',' ');
        }
        
        return redirect('/profissional')->with('error',' ');
    
    }

    
    public function destroy($id){
        $delete = $this->daoProfissional->delete($id);
        if ($delete){
            return redirect('/profissional')->with('success', 'Registro removido com sucesso!');
        }

        return redirect('/profissional')->with('error', 'Este registro não pode ser removido.');
    }

    public function showProfissional(){
        $profissionais = $this->daoProfissional->showProfissional();
        return $profissionais;

    }
}
