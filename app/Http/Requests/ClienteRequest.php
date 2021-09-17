<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [

            'cliente'=> 'required',
            'logradouro'=> 'required',
            'numero'=> 'required',
            'bairro'=> 'required',
            'id_cidade'=> 'required',
            'telefone' => 'required',
            'email'=> 'required',
            'dataNasc'=> 'required',
            'cpf' =>   'required'
            //'id_condicao'=> 'required',
            
        ];
    }

    public function messages(){

        return[
            'cliente.required' => 'Campo obrigatório.',
            'logradouro.required' => 'Campo obrigatório.',
            'numero.required' => 'Campo obrigatório.',
            'bairro.required' => 'Campo obrigatório.',
            'id_cidade.required' => 'Campo obrigatório.',
            'telefone.required' => 'Campo obrigatório.',
            'email.required' => 'Campo  obrigatório.',
            'dataNasc.required' => 'Campo obrigatório.',
            'cpf.required' => 'Campo obrigatório.',
            
           // 'id_condicao.required' => 'Campo obrigatório.',
        ];
        
    }
}
