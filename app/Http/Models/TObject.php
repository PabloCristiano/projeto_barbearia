<?php
namespace App\Http\Models;

use Illuminate\Support\Carbon;


class TObject {

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $dataCadastro;

    /**
     * @var string
     */
    protected $dataAlteracao;

    public function __construct()
    {
        $this->id            = 0;
        $this->data_create  = null;
        $this->data_alt = null;
    }

    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of dataCadastro
     *
     * @return  string
     */
    public function getDataCadastro()
    {
        return $this->data_create;
    }

    /**
     * Set the value of dataCadastro
     *
     * @param  string  $dataCadastro
     *
     */
    public function setDataCadastro(string $data_create = null)
    {
        $data = Carbon::parse($data_create)->toDate()->format('d/M/Y');
        $hora = Carbon::parse($data_create)->toTimeString('minute');

        $this->data_create = $data . ' às ' . $hora;
    }

    /**
     * Get the value of dataAlteracao
     *
     * @return  string
     */
    public function getDataAlteracao()
    {
        return $this->data_alt;
    }

    /**
     * Set the value of dataAlteracao
     *
     * @param  string  $dataAlteracao
     *
     */
    public function setDataAlteracao(string $data_alt = null)
    {
        $data = Carbon::parse($data_alt)->toDate()->format('d/M/Y');
       $hora = Carbon::parse($data_alt)->toTimeString('minute');

        $this->data_alt = $data . ' às ' . $hora;
    }



}