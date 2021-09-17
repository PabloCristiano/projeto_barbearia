<div class="table-responsive">
    <table id="tableCliente" class="table table-hover table-striped shadow-xs rounded" >
        <thead>
            <tr>
                <th>Código</th>
                <th>Cliente</th>
                <th>Telefone</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        
        @if(isset($clientes))
        <tbody> 
            @foreach($clientes as $cliente)   
            <tr>
                <td>{{$cliente->getid()}}</td>
                <td>{{$cliente->getNome()}}</td>
                <td>{{$cliente->getTelefone()}}</td>
                <td class="text-center">
                    <div class="btn-group-xs">
                        <button data-code="{{$cliente->getid()}}"
                                data-cliente="{{$cliente->getNome()}}"
                                data-apelido="{{$cliente->getApelido()}}"
                                data-cpf="{{$cliente->getCpf()}}"
                                data-rg="{{$cliente->getRg()}}"
                                data-datanasc="{{$cliente->getDataNasc()}}"
                                data-logradouro="{{$cliente->getLogradouro()}}"
                                data-numero="{{$cliente->getNumero()}}"
                                data-complemento="{{$cliente->getComplemento()}}"
                                data-bairro="{{$cliente->getBairro()}}"
                                data-cep="{{$cliente->getCep()}}"
                                data-id_cidade="{{$cliente->getCidade()->getid()}}"
                                data-cidade="{{$cliente->getCidade()->getCidade()}}"
                                data-id_condicao="{{$cliente->getCondicaoPagamento()->getid()}}"
                                data-condicao="{{$cliente->getCondicaoPagamento()->getid()}}"
                                data-whatsapp="{{$cliente->getWhatsapp()}}"
                                data-telefone="{{$cliente->getTelefone()}}"
                                data-email="{{$cliente->getEmail()}}"
                                data-senha="{{$cliente->getSenha()}}"
                                data-confsenha="{{$cliente->getConfSenha()}}"
                                data-observacao="{{$cliente->getObservacoes()}}"
                                data-data_create ="{{$cliente->getDataCadastro()}}"
                                data-data_alt ="{{$cliente->getDataAlteracao()}}"


                        class="btn btn-dark alterar"><i class="fa fa-edit"></i></button>
                        <button data-code="{{$cliente->getid()}}"
                                data-cliente="{{$cliente->getNome()}}"
                                data-apelido="{{$cliente->getApelido()}}"
                                data-cpf="{{$cliente->getCpf()}}"
                                data-rg="{{$cliente->getRg()}}"
                                data-datanasc="{{$cliente->getDataNasc()}}"
                                data-logradouro="{{$cliente->getLogradouro()}}"
                                data-numero="{{$cliente->getNumero()}}"
                                data-complemento="{{$cliente->getComplemento()}}"
                                data-bairro="{{$cliente->getBairro()}}"
                                data-cep="{{$cliente->getCep()}}"
                                data-id_cidade="{{$cliente->getCidade()->getid()}}"
                                data-cidade="{{$cliente->getCidade()->getCidade()}}"
                                data-id_condicao="{{$cliente->getCondicaoPagamento()->getid()}}"
                                data-condicao="{{$cliente->getCondicaoPagamento()->getid()}}"
                                data-whatsapp="{{$cliente->getWhatsapp()}}"
                                data-telefone="{{$cliente->getTelefone()}}"
                                data-email="{{$cliente->getEmail()}}"
                                data-senha="{{$cliente->getSenha()}}"
                                data-confsenha="{{$cliente->getConfSenha()}}"
                                data-observacao="{{$cliente->getObservacoes()}}"
                                data-data_create ="{{$cliente->getDataCadastro()}}"
                                data-data_alt ="{{$cliente->getDataAlteracao()}}"
                        class="btn btn-dark excluir"><i class="fa fa-trash-alt"></i></button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
        @endif
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>