<?php

namespace App\Http\Models;


class FormaPagamento extends TObject {
    protected $forma_pg;

    public function __construct()
    {
        $this->forma_pg = '';
        
    }

    
    public function getFormapg(){
        return $this->forma_pg;
    }

    public function setFormapg( string $foma_pg){
        $this->forma_pg = strtoupper($foma_pg);

    }




}