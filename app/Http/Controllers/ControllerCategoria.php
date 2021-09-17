<?php

namespace App\Http\Controllers;
use App\Http\Dao\DaoCategoria;
use Illuminate\Http\Request;

class ControllerCategoria extends Controller{

    private DaoCategoria $daocategoria;

    public function __construct(){
       $this->daocategoria = new DaoCategoria;
       
    }
    
    public function index()
    {
        $categorias = $this->daocategoria->all(true);
        return view('categorias.index', compact('categorias'));
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
        $categoria = $this->daocategoria->create($request->all());
        $store = $this->daocategoria->store($categoria);
        if($store){
            return redirect('/categoria')->with('success', ' ');  
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
        $update = $this->daocategoria->update($request);
        if($update){            
            return redirect('/categoria') ->with('success',' ');
        }
            return redirect('/categoria')->with('error',' ');
    }

    
    public function destroy($id){

        $delete = $this->daocategoria->delete($id);
        if ($delete){
            return redirect('/categoria')->with('success', 'Registro removido com sucesso!');
        }

        return redirect('/categoria')->with('error', 'Este registro não pode ser removido.');
    
    }

    public function showcategoria(){

        $categorias = $this->daocategoria->showcategoria();   
        return $categorias ;
    }

    public function RegistroCategoria( Request $request){
        
        $categoria = $this->daocategoria->create($request->all());
        $store = $this->daocategoria->store($categoria);
        if($store){  
           return response()->json('Categoria adicionado com Sucessoo!!');
        } 
        

    }


}
