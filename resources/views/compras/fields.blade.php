<div class="card col-9 p-0  mx-auto">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <h3 class="ml-3 mb-0">Nova Compra</h3>
        </div>
    </div>
    <div class="card-body">
        <form id="formNovaCompra">
            @csrf
            <div class="form-row">
                <div class="form-group col-xl-2">
                    <label>Modelo *</label>
                    <input type="number" id="modelo" max="99" name="modelo" value="55" class="form-control ">
                </div>
                <div class="form-group col-xl-2">
                    <label>Série *</label>
                    <input type="number" id="serie" name="serie" value="1" max="999" class="form-control ">
                </div>
                <div class="form-group col-xl-2">
                    <label>Número *</label>
                    <input type="number" id="num_nota" name="num_nota" value="" max="999999" class="form-control ">
                </div>
                <div class="form-group col-xl-3">
                    <label>Data Emissão *</label>
                    <input type="date" id="data_emissao" name="data_emissao" value="" class="form-control ">
                </div>
                <div class="form-group col-xl-3">
                    <label>Data Chegada *</label>
                    <input type="date" id="data_chegada" name="data_chegada" value="" class="form-control ">
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-xl-2">
                    <label>Código *</label>
                    <input type="number" id="id_fornecedor" name="id_fornecedor" class="form-control ">
                </div>
                <div class="form-group  col-xl-10" id="ipt-cidade" required>
                    <label>Fornecedor *</label>
                    <div class="input-group">
                        <input class="form-control" name="fornecedor" id="fornecedor" value=""
                            style="text-transform:uppercase;" readonly>

                        <div class="input-group-append">
                            <button class="btn btn-dark btn-search" type="button" data-toggle="modal" data-target="#">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-shopping-cart"></i>
                            <h4 class="ml-3 mb-0">Produtos</h4>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="form-row">
                <div class="form-group col-xl-2">
                    <label>Código *</label>
                    <input type="number" id="id_produto" name="id_produto" class="form-control ">
                </div>
                <div class="form-group  col-xl-10" id="ipt-cidade" required>
                    <label>Produto *</label>
                    <div class="input-group">
                        <input class="form-control" name="produto" id="produto" value=""
                            style="text-transform:uppercase;" readonly>

                        <div class="input-group-append">
                            <button class="btn btn-dark btn-search" type="button" data-toggle="modal" data-target="#">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-xl-2">
                    <label>Unidade</label>
                    <input type="text" id="unidade" name="unidade" value="" class="form-control ">
                </div>
                <div class="form-group col-xl-2">
                    <label>Quantidade</label>
                    <input type="number" id="quantidade" name="quantidade" value="" max="999999" class="form-control ">
                </div>
                <div class="form-group required col-xl-3">
                    <label>Valor Unitário</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input type="number" id="valor_uni" name="valor_uni" class="form-control" value=""
                            placeholder="0,00" required>
                    </div>
                </div>
                <div class="form-group required col-xl-3">
                    <label>Desconto</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">%</span>
                        </div>
                        <input type="number" id="desconto" name="desconto" class="form-control" value=""
                            placeholder="%" required>
                    </div>
                </div>
                {{-- <style>
                    .buttonPersonalizado {
                        height: 40px;
                        margin: -20px -20px;
                        position: relative;
                        top: 50%;
                        left: 30%;
                    }

                </style> --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-dark"
                        style="margin: -20px -20px;position:relative;top:50%;left:20%;width: 0 auto">Adicionar
                        Produto</button>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="table-responsive">
                    <table id="tableProduto" class="table table-hover table-striped shadow-xs rounded">
                        <thead>
                            <tr>
                                <th>Cód</th>
                                <th>Produto</th>
                                <th>Unidade</th>
                                <th>Quantidade</th>
                                <th>Valor Unitário</th>
                                <th>Desconto</th>
                                <th>Valor ToTal</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-center">
                                    <div class="btn-group-xs">
                                        <div class="btn-group-xs">
                                            <button data-cod="" data-categoria="" data-data_create="" data-data_alt=""
                                                title="Visualizar" class="btn btn-dark alterar"><i
                                                    class="far fa-eye"></i></button>

                                        </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-money-bill-alt"></i>
                            <h4 class="ml-3 mb-0">Condição de Pagamento</h4>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="form-group col-xl-2">
                    <label>Código *</label>
                    <input type="number" id="id_condicaopg" name="id_condicaopg" class="form-control ">
                </div>
                <div class="form-group  col-xl-10" id="ipt-cidade" required>
                    <label>Condição Pagamento *</label>
                    <div class="input-group">
                        <input class="form-control" name="condicaopg" id="condicaopg" value=""
                            style="text-transform:uppercase;" readonly>

                        <div class="input-group-append">
                            <button class="btn btn-dark btn-search" type="button" data-toggle="modal" data-target="#">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <table id="tableCondicao" class="table table-hover table-striped shadow-xs rounded">
                    <thead>
                        <tr>
                            <th>Parcela</th>
                            <th>Forma de Pagamento</th>
                            <th>Vencimento</th>
                            <th>Valor da Parcela</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
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
            <div class="form-row">
                <div class="form-group col-xl-12">
                    <label for="observacoes">Observações</label>
                    <textarea name="observacoes" id="servico_observacoes" class="form-control" rows="3"></textarea>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer ">
        <div class="form-row">
            <div class="form-group col-xl-2">
                <small>Cadastrado em:</small>
                <input type="text" class="form-control form-control-sm" name="data_create"
                    id="data_create" readonly>
            </div>
            <div class="form-group col-xl-2">
                <small>Alterado em:</small>
                <input type="text" class="form-control form-control-sm" name="data_alt" id="data_alt"
                    readonly>
            </div>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-dark ">SALVAR</button>
            <a href="/compras" class="btn btn-dark">VOLTAR</a>
        </div>
    </div>
</div>
