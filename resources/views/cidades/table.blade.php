<div class="table-responsive">
    <table id="tablecidade" class="table table-hover table-striped shadow-xs rounded" style="width:100%">
        <thead>
            <tr>
                <th>Código</th>
                <th>Cidade</th>
                <th>DDD</th>
                <th>Estado</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @if (@isset($cidades))
            @foreach ($cidades as $cidade)
            <tr>
                <td>{{$cidade->getId()}}</td>
                <td>{{$cidade->getCidade()}}</td>
                <td>{{$cidade->getDDD()}}</td>
                <td>{{$cidade->getEstado()->getEstado()}}</td>
                <td class="text-center">
                    <div class="btn-group-xs">
                        <button data-cod="{{$cidade->getId()}}"
                                data-cidade="{{$cidade->getCidade()}}"
                                data-ddd="{{$cidade->getDDD()}}"
                                data-cidade_estado="{{$cidade->getEstado()->getEstado()}}"
                                data-cidade_estado_id="{{$cidade->getEstado()->getid()}}"
                                data-data_create="{{$cidade->getDataCadastro()}}"
                                data-data_alt="{{$cidade->getDataAlteracao()}}"                        
                                class="btn btn-dark alterar"><i class="fa fa-edit"></i></button>

                                <button data-cod="{{$cidade->getId()}}"
                                    data-cidade="{{$cidade->getCidade()}}"
                                    data-ddd="{{$cidade->getDDD()}}"
                                    data-cidade_estado="{{$cidade->getEstado()->getEstado()}}"
                                    data-cidade_estado_id="{{$cidade->getEstado()->getid()}}"
                                    data-data_create="{{$cidade->getDataCadastro()}}"
                                    data-data_alt="{{$cidade->getDataAlteracao()}}"                        
                                    class="btn btn-dark excluir"><i class="fa fa-trash-alt"></i></button>                       
                    </div>
                </td>
            </tr>
            @endforeach
           @endif

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
