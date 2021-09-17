<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RequestFormPais;
use App\Http\DAO\DaoPais;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Mail\Message;

class ControllerPais extends Controller{

    private DaoPais $Pais;

    public function __construct(){
        $this->daopais = new DaoPais();
    }


    
    public function index(){
        $paises = $this->daopais->all(true);
        return view('paises.index',compact('paises'));
        
    }

    
    public function create(){
        return view('paises.formulario');
    }

    
    public function store(Request $request){       
       $pais = $this->daopais->create($request->all());
       $store = $this->daopais->store($pais);

       if($store){
           
           return redirect('/pais')->with('success',' ');
       }
    }

    
    public function show($id)
    {
        
    
    }

    
    public function edit(Request $request){
      $update = $this->daopais->update($request);
       if ($update)
        return redirect('/pais') ->with('info', ' ');
        
        return redirect('/pais')->withT('error',' ');
          
    }


    public function update(Request $request, $id){
        
    }

    public function destroy($id){
        $delete = $this->daopais->delete($id);      
        if ($delete){                        
            return redirect('/pais')->with('warning',' ');
        }      
        return redirect()->back()->with('alert',' ');
    }

    //lapidar função jquery no index.estado 

    public function Registro( Request $request){
       
        $pais = $this->daopais->create($request->all());
        $store = $this->daopais->store($pais);
        if($store){  
           return response()->json('Pais adicionado com Sucessoo!!');
        } 
    }

    public function showpais(){
       $paises = $this->daopais->showpais();
       return $paises;
        
    }



}
