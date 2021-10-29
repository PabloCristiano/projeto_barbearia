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
                        class="btn btn-dark alterar"><i class="fa fa-edit"></i></button>
                        <button data-code="{{$cliente->getid()}}"
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