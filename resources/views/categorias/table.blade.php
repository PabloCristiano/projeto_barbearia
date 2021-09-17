<div class="table-responsive">
    <table id="tableCategoria" class="table table-hover table-striped shadow-xs rounded" id="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Categoria</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
           
            @if (@isset($categorias))
            @foreach ($categorias as $categoria)
            <tr>
                <td>{{$categoria->getid()}}</td>
                <td>{{$categoria->getcategoria()}}</td>
                <td class="text-center">
                    <div class="btn-group-xs">
                        <div class="btn-group-xs">
                            <button data-cod="{{$categoria->getid()}}"
                                    data-categoria="{{$categoria->getCategoria()}}"
                                    data-data_create="{{$categoria->getDataCadastro()}}"
                                    data-data_alt="{{$categoria->getDataAlteracao()}}"                        
                                    class="btn btn-dark alterar"><i class="fa fa-edit"></i></button>
    
                                    <button data-cod="{{$categoria->getid()}}"
                                            data-categoria="{{$categoria->getCategoria()}}"
                                            data-data_create="{{$categoria->getDataCadastro()}}"
                                            data-data_alt="{{$categoria->getDataAlteracao()}}"                        
                                        class="btn btn-dark excluir"><i class="fa fa-trash-alt"></i></button>                       
                        </div>
                    </td>
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
