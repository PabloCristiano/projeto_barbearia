<div class="table-responsive">
    <table  id="tableservicos" class="table table-hover table-striped shadow-xs rounded" id="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Serviço</th>
                <th>Valor</th>
                <th>Tempo</th>
                <th class="text-center">Ações</th>                
            </tr>
        </thead>
        <tbody>
        @if (@isset($servicos))
          @foreach($servicos as $servico)    
            <tr>
                <td>{{$servico->getid()}}</td>
                <td>{{$servico->getServico()}}</td>
                <td><b>R$ </b>{{$servico->getValor()}}</td>
                <td>{{$servico->getTempo()}} <b>H/min</b></td>
                <td class="text-center">
                    <div class="btn-group-xs">
                        <button
                            data-id="{{$servico->getid()}}" 
                            data-servico="{{$servico->getServico()}}"
                            data-tempo ="{{$servico->getTempo()}}" 
                            data-valor="{{$servico->getValor()}}" 
                            data-comissao ="{{$servico->getComissao()}}" 
                            data-observacoes="{{$servico->getObservacoes()}}" 
                            data-data_create="{{$servico->getDataCadastro()}}" 
                            data-data_alt="{{$servico->getDataAlteracao()}}" 
                            class="alterarservico btn btn-dark"><i class="fa fa-edit"></i></button>

                        <button 
                            data-id="{{$servico->getid()}}" 
                            data-servico="{{$servico->getServico()}}"
                            data-tempo ="{{$servico->getTempo()}}" 
                            data-valor="{{$servico->getValor()}}" 
                            data-comissao ="{{$servico->getComissao()}}" 
                            data-observacoes="{{$servico->getObservacoes()}}"
                            data-data_create="{{$servico->getDataCadastro()}}" 
                            data-data_alt="{{$servico->getDataAlteracao()}}"
                            class="deleteservico btn btn-dark"><i class="fa fa-trash-alt"></i></button>
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
            </tr>
        </tfoot>
    </table>
</div>