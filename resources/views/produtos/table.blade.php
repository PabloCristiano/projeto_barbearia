<div class="table-responsive">
    <table id="tableProdutos" class="table table-hover table-striped shadow-xs rounded" >
        <thead>
            <tr>
                <th>Código</th>
                <th>Produto</th>
                <th>Categoria</th>
                <th>Qtd Estoque</th>
                <th>Preço de Venda</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody> 
            @if(isset($produtos))
             @foreach($produtos as $produto)             
            <tr>
                <td>{{$produto->getid()}}</td>
                <td>{{$produto->getProduto()}}</td>
                <td>{{$produto->getCategoria()->getCategoria()}}</td>
                <td>{{$produto->getQtdEstoque()}}</td>
                <td><b>R$</b> {{$produto->getPrecoVenda()}}</td>
                <td class="text-center">
                    <div class="btn-group-xs">
                        <button data-cod ="{{$produto->getid()}}"
                                data-produto ="{{$produto->getProduto()}}"
                                data-unidade ="{{$produto->getUnidade()}}"
                                data-id_categoria ="{{$produto->getCategoria()->getid()}}"
                                data-categoria ="{{$produto->getCategoria()->getCategoria()}}"
                                data-id_fornecedor ="{{$produto->getFornecedor()->getid()}}"
                                data-fornecedor ="{{$produto->getFornecedor()->getRazaoSocial()}}"
                                data-qtdestoque ="{{$produto->getQtdEstoque()}}"
                                data-precocusto ="{{$produto->getPrecoCusto()}}"
                                data-precovenda ="{{$produto->getPrecoVenda()}}"
                                data-custoultcompra ="{{$produto->getCustoUltCompra()}}"  
                                data-dataultcompra ="{{$produto->getDataUltCompra()}}"
                                data-dataultvenda ="{{$produto->getDataUltVenda()}}"
                                data-data_create ="{{$produto->getDataCadastro()}}"
                                data-data_alt ="{{$produto->getDataAlteracao()}}"    
                        class="btn btn-dark alterar">
                            <i class="fa fa-edit"></i>
                        </button>

                        <button data-cod="{{$produto->getid()}}"
                                data-produto="{{$produto->getProduto()}}"
                                data-unidade="{{$produto->getUnidade()}}"
                                data-id_categoria="{{$produto->getCategoria()->getid()}}"
                                data-categoria="{{$produto->getCategoria()->getCategoria()}}"
                                data-id_fornecedor="{{$produto->getFornecedor()->getid()}}"
                                data-fornecedor="{{$produto->getFornecedor()->getRazaoSocial()}}"
                                data-qtdestoque="{{$produto->getQtdEstoque()}}"
                                data-precocusto="{{$produto->getPrecoCusto()}}"
                                data-precovenda="{{$produto->getPrecoVenda()}}"
                                data-custoultcompra="{{$produto->getCustoUltCompra()}}"  
                                data-dataultcompra="{{$produto->getDataUltCompra()}}"
                                data-dataultvenda="{{$produto->getDataUltVenda()}}"
                                data-data_create="{{$produto->getDataCadastro()}}"
                                data-data_alt="{{$produto->getDataAlteracao()}}"
                        class="btn btn-dark excluir" >
                            <i class="fa fa-trash-alt"></i>
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
                <th ></th>
                <th ></th>
            </tr>
        </tfoot>
    </table>
</div>
