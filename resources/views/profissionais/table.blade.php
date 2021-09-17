<div class="table-responsive">
    <table id="tableprofissional" class="table table-hover table-striped shadow-xs rounded">
        <thead>
            <tr>
                <th>Código</th>
                <th>Profissional</th>
                <th>WhatsApp</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody> 
           
            @if (@isset($profissionais))
            @foreach ($profissionais as $profissional)  
            <tr>
                <td>{{$profissional->getid()}}</td>
                <td>{{$profissional->getNome()}}</td>
                <td>{{$profissional->getWhatsapp()}}</td>
                <td class="text-center">
                    <div class="btn-group-xs">
                        <button data-cod="{{$profissional->getid()}}"
                                data-profissional="{{$profissional->getNome()}}"
                                data-apelido="{{$profissional->getApelido()}}"
                                data-cpf="{{$profissional->getCpf()}}"
                                data-rg="{{$profissional->getRg()}}"
                                data-nasci="{{$profissional->getdataNasc()}}"
                                data-logradouro="{{$profissional->getLogradouro()}}"
                                data-numero="{{$profissional->getNumero()}}"
                                data-complemento="{{ $profissional->getComplemento()}}"
                                data-bairro="{{$profissional->getBairro()}}"
                                data-cep="{{ $profissional->getCep()}}"
                                data-id_cidade="{{$profissional->getCidade()->getId()}}"
                                data-nome_cidade="{{$profissional->getCidade()->getCidade()}}"
                                data-id_servico="{{$profissional->getServico()->getId()}}"
                                data-nome_servico="{{$profissional->getServico()->getServico()}}"
                                data-whatsapp="{{$profissional->getWhatsapp()}}"
                                data-telefone="{{$profissional->getTelefone()}}"
                                data-email="{{$profissional->getEmail()}}"
                                data-senha="{{ $profissional->getSenha()}}"
                                data-confSenha="{{$profissional->getConfSenha()}}"
                                data-tipo="{{$profissional->getTipoProf()}}"
                                data-comissao="{{$profissional->getComissao()}}"
                                data-data_create="{{$profissional->getDataCadastro()}}"
                                data-data_alt="{{$profissional->getDataAlteracao()}}"                     
                        class="btn btn-dark alterar"><i class="fa fa-edit"></i></button>
                        
                        <button data-cod="{{$profissional->getid()}}"
                                data-profissional="{{$profissional->getNome()}}"
                                data-apelido="{{$profissional->getApelido()}}"
                                data-cpf="{{$profissional->getCpf()}}"
                                data-rg="{{ $profissional->getRg()}}"
                                data-dataNasc="{{$profissional->getDataNasc()}}"
                                data-logradouro="{{$profissional->getLogradouro()}}"
                                data-numero="{{$profissional->getNumero()}}"
                                data-complemento="{{ $profissional->getComplemento()}}"
                                data-bairro="{{$profissional->getBairro()}}"
                                data-cep="{{ $profissional->getCep()}}"
                                data-id_cidade="{{$profissional->getCidade()->getId()}}"
                                data-nome_cidade="{{$profissional->getCidade()->getCidade()}}"
                                data-id_servico="{{$profissional->getServico()->getId()}}"
                                data-nome_servico="{{$profissional->getServico()->getServico()}}"
                                data-whatsapp="{{$profissional->getWhatsapp()}}"
                                data-telefone="{{$profissional->getTelefone()}}"
                                data-email="{{$profissional->getEmail()}}"
                                data-senha="{{ $profissional->getSenha()}}"
                                data-confSenha="{{$profissional->getConfSenha()}}"
                                data-tipoProf="{{$profissional->getTipoProf()}}"
                                data-comissao="{{$profissional->getComissao()}}"
                                data-data_create="{{$profissional->getDataCadastro()}}"
                                data-data_alt="{{$profissional->getDataAlteracao()}}" 
                        class="btn btn-dark excluir"><i class="fa fa-trash-alt"></i></button>
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
            </tr>
        </tfoot>
    </table>
</div>