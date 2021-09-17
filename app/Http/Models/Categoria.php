<?php
namespace App\Http\Models;


class Categoria extends TObject {

    private $categoria;


    public function __construct(){
        $this->categoria = '';
        
    }

    public function setCategoria($categoria){
        $this->categoria = strtoupper($categoria);
    }

    public function getCategoria(){
        return $this->categoria;
    }







}