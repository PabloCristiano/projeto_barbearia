<div class="table-responsive">
    <table id="tableFornecedor" class="table table-hover table-striped shadow-xs rounded">
        <thead>
            <tr>
                <th>Código</th>
                <th>Fornecedor</th>
                <th>Nome Fantasia</th>
                <th>Contado</th>
                <th>Telefone</th>
                <th>Cidade</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>           
            @if(@isset($fonecedores))
            @foreach($fonecedores as $Fornecedor)
            <tr>
                <td>{{$Fornecedor->getid()}}</td>
                <td>{{$Fornecedor->getRazaoSocial()}}</td>
                <td>{{$Fornecedor->getNomeFantasia()}}</td>
                <th>{{$Fornecedor->getContato()}}</th>
                <td>{{$Fornecedor->getTelefone()}}</td>
                <td>{{$Fornecedor->getCidade()->getCidade()}}</td>
                <td class="text-center">
                    <div class="btn-group-xs">
                        <button data-cod="{{$Fornecedor->getid()}}"
                                data-tipo_pessoa="{{$Fornecedor->getTipoPessoa()}}"
                                data-rsaocial="{{$Fornecedor->getRazaoSocial()}}"
                                data-nomefantasia="{{$Fornecedor->getNomeFantasia()}}"
                                data-apelido="{{ $Fornecedor->getNome()}}"
                                data-logradouro="{{ $Fornecedor->getLogradouro()}}"
                                data-numero="{{$Fornecedor->getNumero()}}"
                                data-complemento="{{ $Fornecedor->getComplemento()}}"
                                data-bairro="{{$Fornecedor->getBairro()}}"
                                data-cep="{{ $Fornecedor->getCep()}}"
                                data-id_cidade="{{$Fornecedor->getCidade()->getId()}}"
                                data-cidade="{{$Fornecedor->getCidade()->getCidade()}}"
                                data-cidade="{{$Fornecedor->getCidade()->getCidade()}}"
                                data-whatsapp="{{ $Fornecedor->getWhatsapp()}}"
                                data-telefone="{{$Fornecedor->getTelefone()}}"
                                data-email="{{$Fornecedor->getEmail()}}"
                                data-pagsite="{{ $Fornecedor->getPagSite()}}"
                                data-contato="{{ $Fornecedor->getContato()}}"
                                data-cnpj="{{$Fornecedor->getCnpj()}}"
                                data-ie="{{$Fornecedor->getInscricaoEstadual()}}"
                                data-cpf="{{$Fornecedor->getCpf()}}"
                                data-rg="{{$Fornecedor->getRg()}}"
                                data-id_condicaopg="{{$Fornecedor->getCondicaoPagamento()->getId()}}"
                                data-condicaopg="{{$Fornecedor->getCondicaoPagamento()->getCondicaoPagamento()}}"
                                data-limitecredito="{{$Fornecedor->getLimiteCredito()}}"
                                data-obs="{{$Fornecedor->getObservacoes()}}"
                                 
                            class="btn btn-dark alterar"><i class="fa fa-edit"></i>
                        </button> 

                        <button data-cod="{{$Fornecedor->getid()}}"
                                data-tipo_pessoa="{{$Fornecedor->getTipoPessoa()}}"
                                data-rsaocial="{{$Fornecedor->getRazaoSocial()}}"
                                data-nomefantasia="{{$Fornecedor->getNomeFantasia()}}"
                                data-apelido="{{ $Fornecedor->getNome()}}"
                                data-logradouro="{{ $Fornecedor->getLogradouro()}}"
                                data-numero="{{$Fornecedor->getNumero()}}"
                                data-complemento="{{ $Fornecedor->getComplemento()}}"
                                data-bairro="{{$Fornecedor->getBairro()}}"
                                data-cep="{{ $Fornecedor->getCep()}}"
                                data-id_cidade="{{$Fornecedor->getCidade()->getId()}}"
                                data-cidade="{{$Fornecedor->getCidade()->getCidade()}}"
                                data-whatsapp="{{ $Fornecedor->getWhatsapp()}}"
                                data-telefone="{{$Fornecedor->getTelefone()}}"
                                data-email="{{$Fornecedor->getEmail()}}"
                                data-pagSite="{{ $Fornecedor->getPagSite()}}"
                                data-contato="{{ $Fornecedor->getContato()}}"
                                data-cnpj="{{$Fornecedor->getCnpj()}}"
                                data-ie="{{$Fornecedor->getInscricaoEstadual()}}"
                                data-cpf="{{$Fornecedor->getCpf()}}"
                                data-rg="{{$Fornecedor->getRg()}}"
                                data-id_condicaopg="{{$Fornecedor->getCondicaoPagamento()->getId()}}"
                                data-limitecredito="{{$Fornecedor->getLimiteCredito()}}"
                                data-obs="{{$Fornecedor->getObservacoes()}}"
                           class="btn btn-dark excluir"><i class="fa fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>
         @endforeach
         @endif   
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <td></td>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>