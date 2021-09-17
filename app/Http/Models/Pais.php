<?php

namespace App\Http\Models;
use Illuminate\Support\Facades\Crypt;

class Pais extends TObject {

    public function __construct()
    {
        $this->pais = '';
        $this->sigla = '';
        $this->ddi = '';
    }

    
    public function getPais()
    {
        return  $this-> pais ;
    }

    
    public function setPais(string $pais)
    {
        $this->pais = strtoupper($pais);
    }

    
    public function getSigla()
    {
        return $this->sigla;
    }

    
    public function setSigla(string $sigla)
    {
        $this->sigla = strtoupper($sigla);
    }

    
    public function getDDI()
    {
        return $this->ddi;
    }

    
    public function setDDI(string $ddi)
    {
        $this->ddi = strtoupper($ddi);
    }

}