<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;
use  App\Http\Dao\DaoFormaPagamento;

class ControllerFormaPagamento extends Controller
{
    private DaoFormaPagamento $FormaPagamanto;

    public function __construct(){
     $this->daoformapagamento = new DaoFormaPagamento();
        
    }



    public function index()
    {
        $formapg = $this->daoformapagamento->all(true);
        return view('formapagamento.index', compact('formapg'));

    }

    
    public function create(){
        
    }

    
    public function store(Request $request){


        $formapg = $this->daoformapagamento->create($request->all());
        $store = $this->daoformapagamento->store($formapg);
        if($store){
            return redirect('/formapagamento')->with('success',' ');
        }
        
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        
    }

    
    public function update(Request $request){

        
        $update = $this->daoformapagamento->update($request);
        if($update){            
           return redirect('/formapagamento') ->with('success',' ');
        }
        
           return redirect('/formapagamento')->with('error',' ');
        
    }

   
    public function destroy($id){

        $delete = $this->daoformapagamento->delete($id);
        if ($delete){
            return redirect('/formapagamento')->with('success', 'Registro removido com sucesso!');
        }

        return redirect('/formapagamento')->with('error', 'Este registro não pode ser removido.');
    }
}
