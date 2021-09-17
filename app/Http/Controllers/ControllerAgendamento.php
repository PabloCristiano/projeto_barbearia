<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\Dao\DaoAgendamento;
class ControllerAgendamento extends Controller{

    private $daoagendamento ;



    public function __construct(){
         $this->daoagendamento = new DaoAgendamento;
                  
     }
    
    public function index(){
        return view('agendamento.index');
    }

    
    public function create(){
        
    }

   
    public function store(Request $request){
        
    }

   
    public function show(){
        
        $agendamento = $this->daoagendamento->all(true);
        $count =count($agendamento);
        $events=array();
        for($i=0; $i<$count; $i++ ){
            $dados = [
                "id"            => $agendamento[$i]["id"],
                "title"         => $agendamento[$i]["cliente"],
                "start"         => $agendamento[$i]["data_create"],
                "profissional"  => $agendamento[$i]["profissional"],
                "servico"       => $agendamento[$i]["servico"]
            ];
             array_push($events, $dados);        
        }         
        return response::json($events);
   
    }

    
    public function edit($id){
        
    }

    
    public function update(Request $request, $id){
        
    }

    
    public function destroy($id){
       
    }
    public function addhora(){
        return view('agendamento.addhora');
       
    }
}
