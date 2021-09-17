<?php
namespace App\Http\Models;


class Servico extends TObject{

    protected $servico;
    protected $tempo;
    protected $valor;
    protected $comissao;
    protected $observacoes;

    public function __construct(){

        $this->servico = '';
        $this->tempo = '';
        $this->valor = '';
        $this->comissao = '';
        $this->observacoes= '';
        
    }

    // SETTERS

    public function setServico($servico){
        $this->servico = strtoupper($servico);

    }
    
    public function setTempo($tempo){
        $this->tempo = $tempo;

    }
    
    public function setValor($valor){
        $this->valor = $valor;

    }
    
    public function setObservacoes($observacoes){
        $this->observacoes = strtoupper($observacoes);

    }
    
    
    public function setComissao($comissao){
        $this->comissao = $comissao;

    }


    // GETTERS

    public function getServico(){
        return $this->servico;
    }
    
    public function getTempo(){
        return $this->tempo;
    }
    
    public function getValor(){
        return $this->valor;
    }
    
    public function getComissao(){
        return $this->comissao;
    }
    
    public function getObservacoes(){
        return $this->observacoes;
    }





















}
