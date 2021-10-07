<?php


namespace App\Http\Models;

use App\Http\Models\CondicaoPagamento;




class Cliente extends Pessoa{

    protected $apelido;
    protected $senha;
    protected $confSenha;
    protected $condicaoPagamento;

    public function __construct(){

        $this->apelido = '';
        $this->senha = '';
        $this->confSenha = '';
        $this->condicaoPagamento = new CondicaoPagamento();
    }


    public function getApelido(){
        return $this->apelido;
    
    }

    public function setApelido(string $apelido){
        $this->apelido = strtoupper($apelido);
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha(string $senha){
        $this->senha = $senha;
    }

    public function getConfSenha(){
        return $this->confSenha;
    }

    public function setConfSenha(string $confSenha){
        $this->confSenha = $confSenha;
    }

    public function getCondicaoPagamento(){
        return $this->condicaoPagamento;
    } 

    public function setCondicaoPagamento(CondicaoPagamento $condicaoPagamento){
        $this->condicaoPagamento = $condicaoPagamento;
    }


}