<?php

namespace App\Http\Models;

class Pais extends TObject {

    public function __construct()
    {
        $this->pais = '';
        $this->sigla = '';
        $this->ddi = '';
    }

    
    public function getPais()
    {
        return $this->pais;
    }

    
    public function setPais(string $pais)
    {
        $this->pais = $pais;
    }

    
    public function getSigla()
    {
        return $this->sigla;
    }

    
    public function setSigla(string $sigla)
    {
        $this->sigla = $sigla;
    }

    
    public function getDDI()
    {
        return $this->ddi;
    }

    
    public function setDDI(string $ddi)
    {
        $this->ddi = $ddi;
    }

}