<?php

namespace App\Http\Controllers;
use App\Http\Dao\DaoServico;

use Illuminate\Http\Request;

class ControllerServico extends Controller
{
    private $daoServico;

    public function __construct(){

        $this->daoServico = new DaoServico;
        
    }
    public function index()
    {
         $servicos = $this->daoServico->all(true);
        return view('servicos.index', compact('servicos'));
    }
    
    public function store(Request $request)
    {
        $servico = $this->daoServico->create($request->all());
        $store = $this->daoServico->store($servico);
        if($store){
            return redirect('/servico')->with('success', ' ');  
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

    
    public function update(Request $request)
    {
        $id = $request->id;
        $update = $this->daoServico->update($request, $id);
        if($update){            
           return redirect('/servico') ->with('success',' ');
        }
        
        return redirect('/servico')->with('error',' ');
        
    }

    
    public function destroy($id)
    {
        $delete = $this->daoServico->delete($id);
        if ($delete){
            return redirect('/servico')->with('success', 'Registro removido com sucesso!');
        }

        return redirect('/servico')->with('error', 'Este registro não pode ser removido.');
    }
}
