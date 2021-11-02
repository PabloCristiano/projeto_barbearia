<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Dao\DaoProduto;

class ControllerCompra extends Controller{
    
    private $daoProduto;

    public function __construct(){
        $this->daoProduto = new DaoProduto;
    }

    public function index(){
        return view('compras.index');
    }

    
    public function create(){
        return view('compras.compraCreate');
    
    }

    
    public function store(Request $request){
        
    }

    public function show($id){
        
    }

    
    public function edit($id){
    
    }

    
    public function update(Request $request, $id){
    
    }

    
    public function destroy($id){
    
    }
}
