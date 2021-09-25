<?php

namespace App\Http\Models;

use App\Http\Models\FormaPagamento;
use App\Http\Models\CondicaoPagamento;

class Parcela extends TObject{
    protected $parcela;
    protected $prazo;
    protected $porcentagem;
    protected $formaPagamento;

    

    public function __construct()
    {
        $this->parcela = 0;
        $this->prazo  = 0;
        $this->porcentagem = 0;
        $this->formaPagamento    = new FormaPagamento();
    }

    
    public function getParcela(){
        return $this->parcela;
    }

    
    
    public function setParcela(int $parcela){
        $this->parcela = $parcela;
    }

    public function getPrazo(){
        return $this->prazo;
    }

    
    public function setPrazo(int $prazo){
        $this->prazo = $prazo;
    }

    
    public function getPorcentagem(){
        return $this->porcentagem;
    }

    
    public function setPorcentagem(float $porcentagem){
        $this->porcentagem = $porcentagem;
    }

    
    public function getFormaPagamento(){
        return $this->formaPagamento;
    }

    
    public function setFormaPagamento(FormaPagamento $formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;
    }



}