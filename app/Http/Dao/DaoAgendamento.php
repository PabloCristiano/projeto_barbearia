<?php

namespace App\Http\Dao;
use App\Http\Dao\Dao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

Class DaoAgendamento implements Dao {
    

    public function __construct(){
        
        
    }

    public function all(bool $model = false){
        $itens = DB:: select(
            'select * from agendamento;');        
            $agendamentos = array();
            foreach($itens as $item){
                $agendamento = get_object_vars($item);
                array_push($agendamentos, $agendamento);
            }    
            return $agendamentos;

    }

    public function create(array $dados){
        

    }

    public function store($obj){

        


    }

    public function update(Request $request){

       

    }

    public function delete($id){
        

    }

    public function findById(int $id, bool $model = false){
        


    }

    public function getData() {

        
    }

    public function showcidade(){
        
            
    }

}