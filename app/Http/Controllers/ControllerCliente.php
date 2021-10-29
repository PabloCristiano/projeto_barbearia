<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Dao\DaoCliente;
use App\Http\Dao\DaoCidade;
use App\Http\Dao\DaoCondicaoPagamento;
use App\Http\Requests\ClienteRequest;
use Illuminate\Support\Facades\Response;

class ControllerCliente extends Controller
{

    private $daoCliente;
    private $daoCidade;
    private $CondicaoPagamento;

    public function __construct()
    {
        $this->daoCliente = new DaoCliente;
        $this->daoCidade  = new DaoCidade;
        $this->daoCondicaoPagamento = new DaoCondicaoPagamento;
    }

    public function index()
    {
        $clientes = $this->daoCliente->all(true);
        $cidades  = $this->daoCidade->all(true);
        return view('clientes.index', compact('clientes', 'cidades'));
    }


    public function clienteadd(Request $request)
    {
        $id = $request->id;
        $cliente = $this->daoCliente->pesquisar($request->cliente);
        $cpf = $this->validarCpf($request->cpf);
        $cidade = $this->daoCidade->findById($request->id_cidade, false);
        $destroy = $request->destroy;

        // $msgcliente['success'] = true;
        // $msgcliente['message'] = $destroy;
        // echo json_encode($msgcliente);

        if ($destroy === 'excluir') {
            $delete = $this->daoCliente->delete($id);
            if ($delete) {
                $msgcliente['success'] = true;
                $msgcliente['message'] = 'Cliente excluido com Sucesso !';
                echo json_encode($msgcliente);
            } else {
                $msgcliente['success'] = false;
                $msgcliente['message'] = 'Cliente não foi excluido !';
                echo json_encode($msgcliente);
            }
        } else if ($id > 0) {

            if ($cpf === false) {
                $msgcliente['cpf'] = false;
                $msgcliente['message'] = 'Por favor digite um cpf válido!!';
                echo json_encode($msgcliente);
            } elseif (empty($cidade)) {

                $msgcliente['cidade'] = false;
                $msgcliente['message'] = 'Cidade não Cadastrada !!!';
                echo json_encode($msgcliente);
            } else {
                $update =  $this->daoCliente->update($request);
                if ($update) {
                    $msgcliente['success'] = true;
                    $msgcliente['message'] = 'Cliente Alterado com Sucesso !';
                    echo json_encode($msgcliente);
                }
            }
        } else {

            if ($cpf === false) {
                $msgcliente['cpf'] = false;
                $msgcliente['message'] = 'Por favor digite um cpf válido!!';

                echo json_encode($msgcliente);
            } elseif (!empty($cliente) === true) {

                $msgcliente['cliente'] = false;
                $msgcliente['message'] = 'Cliente já Cadastrado';
                echo json_encode($msgcliente);
            } elseif (empty($cidade)) {

                $msgcliente['cidade'] = false;
                $msgcliente['message'] = 'Cidade não Cadastrada !!!';
                echo json_encode($msgcliente);
            } else {
                $clientes = $this->daoCliente->create($request->all());
                $store = $this->daoCliente->store($clientes);

                if ($store) {
                    $msgcliente['success'] = true;
                    $msgcliente['message'] = 'Cliente cadastrado com sucesso !!';
                    echo json_encode($msgcliente);
                } else {
                    $msgcliente['success'] = false;
                    $msgcliente['message'] = 'Cliente não cadastrado !!';
                    echo json_encode($msgcliente);
                }
            }
        }
    }


    public function store(Request $request){
        $clientes = $this->daoCliente->create($request->all());
        $store = $this->daoCliente->store($clientes);
        if ($store) {
            return redirect('/cliente')->with('Cadastrado', 'show');
        }
    }

    public function update(Request $request){
        $update =  $this->daoCliente->update($request);
        if ($update) {
            return redirect('/cliente')->with('alterado', 'show');
        }
        return redirect('/cliente')->with('error', ' ');
    }


    public function destroy($id){
        $delete = $this->daoCliente->delete($id);
        if ($delete) {
            return redirect('/cliente')->with('excluido', 'show');
        }

        return redirect('/cliente')->with('errorExcluido', 'show');
    }

    public function validarCpf($valor)
    {
        $valor = str_replace(array('.', '-', '/'), "", $valor);
        $cpf = str_pad(preg_replace('[^0-9]', '', $valor), 11, '0', STR_PAD_LEFT);

        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') :
            return false;
        else :
            for ($t = 9; $t < 11; $t++) :
                for ($d = 0, $c = 0; $c < $t; $c++) :
                    $d += $cpf[$c] * (($t + 1) - $c);
                endfor;
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) :
                    return false;
                endif;
            endfor;
            return true;
        endif;
    }

    public function showClientes(){
        $listClientes = $this->daoCliente->ShowClientes();
        return $listClientes;
    }

    public function findById(Request $request){
        $search = $this->daoCliente->findById($request->search,false);
        if($search){
            return response()->json($search);
        }        
        return response()->json('error');
    }
    
    public function findByIdCliente(Request $request){
        $search = $this->daoCliente->findById($request->id,false);
        if($search){
            return response()->json($search);
        }        
        return response()->json('error');
    }
    
    public function findByCpfCliente(Request $request){
        $cpf = $this->daoCliente->findByCpfCliente($request->id,false);
        if($cpf){
            return response::json(array('success' => true, 'data' => $cpf));
        }        
        return response::json(array('success' => false, 'data' => 'Deu ruim '));
    }

    
}
