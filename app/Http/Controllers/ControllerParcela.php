<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Dao\DaoParcela;

class ControllerParcela extends Controller{

    private DaoParcela $daoParcela;

    public function __construct()
    {
        $this->daoParcela = new DaoParcela();
    }

   
    public function index()
    {
        //
    }

   
    public function create(){
        
    }

  
    public function store(Request $request)
    {
        //
    }

 
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id){

        $delete = $this->daoParcela->delete($id);

        if ($delete)
            return redirect()->back()->with('success', 'Parcela removida com sucesso!');

        return redirect()->back()->with('error', 'Erro ao remover parcela.');

    }
}
