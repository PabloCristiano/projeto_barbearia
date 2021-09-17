<?php


namespace App\Http\Models;

use App\Http\Models\Servico;

class Profissional extends Pessoa {

protected $apelido;
protected $senha;
protected $confSenha;
protected $tipoProf;
Protected $comissao;
protected $servico;

public function __construct(){

   $this->apelido = null;
   $this->senha = '';
   $this->confSenha = '';
   $this->tipoProf = '';
   $this->comissao = 0;
   $this->servico = new Servico();
    
}


public function getApelido(){
    return $this->apelido;

}

public function getSenha(){
    return $this->senha;
}

public function getConfSenha(){
    return $this->confSenha;
}

public function getTipoProf(){
    return $this->tipoProf;
}

public function getComissao(){
    return $this->comissao;
}

public function getServico(){
    return $this->servico;
}

public function setApelido(string $apelido){
   $this->apelido = strtoupper($apelido);
}

public function setSenha(string $senha){
    $this->senha = $senha;
}

public function setConfSenha(string $confSenha){
    $this->confSenha = $confSenha;
}

public function setTipoProf(string $tipoProf){
    $this->tipoProf = strtoupper($tipoProf);
}

public function setComissao(float $comissao){
    $this->comissao = $comissao;
}

public function setServico(Servico $servico){
    $this->servico = $servico;
}







}
