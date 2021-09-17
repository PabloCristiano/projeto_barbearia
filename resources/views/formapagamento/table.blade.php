<div class="table-responsive">
    <table id="tableformapagamento" class="table table-hover table-striped shadow-xs rounded" style="width:100%">
        <thead>
            <tr>
                <th>Código</th>
                <th>Forma de Pagamento</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
        @if(@isset($formapg))
          @foreach($formapg as $formaspg)
            <tr>
                <td>{{$formaspg->getId()}}</td>
                <td>{{$formaspg->getFormapg()}}</td>
                <td class="text-center">
                    <div class="btn-group-xs">
                        <button  data-id="{{ $formaspg->getId() }}"
                                 data-nome="{{ $formaspg->getFormapg() }}"
                                 data-data_create="{{ $formaspg->getDataCadastro() }}"
                                 data-data_alt="{{ $formaspg->getDataAlteracao() }}"                        
                        class="btn btn-dark alterar"><i class="fa fa-edit"></i></button>

                        <button data-id="{{ $formaspg->getId() }}"
                                data-nome="{{ $formaspg->getFormapg() }}"
                                data-data_create="{{ $formaspg->getDataCadastro() }}"
                                data-data_alt="{{ $formaspg->getDataAlteracao() }}"                  
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
            </tr>
        </tfoot>
    </table>
</div>
