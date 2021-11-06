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
                            <button class="btn btn-dark btn-search" type="button" data-toggle="modal"
                                data-target=".modalbuscafornecedores">
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
                            <button id="btnSearchProduto" class="btn btn-dark btn-search" type="button"
                                data-toggle="modal" data-target=".modalBuscaProdutos" disabled>
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                {{-- <div class="form-group col-xl-2">
                    <label>Unidade</label>
                    <input type="text" id="unidade" name="unidade" value="" class="form-control ">
                </div> --}}
                <input type="hidden" id="qtd_Produto" name="qtd_Produto" value="0">
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
                            placeholder="0,00" required readonly>
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
                <div class="form-group col-xl-2 d-flex align-items-end">
                    <button id="btnAddProduto" type="button" class="btn btn-dark" disabled>Adicionar</button>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="table-responsive">
                    <table id="tableProduto" class="table table-hover table-striped shadow-xs rounded">
                        <thead>
                            <tr>
                                <th class="text-center">Cód</th>
                                <th class="text-center">Produto</th>
                                <th class="text-center">Uni</th>
                                <th class="text-center">Qtd</th>
                                <th class="text-center">Valor Un</th>
                                <th class="text-center">Desc</th>
                                <th class="text-center">SubToTal</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
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
                            </tr> --}}
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
            <div class="card-footer text-right">
                <div class="row">
                    <div class="col-md-9 text-right">
                        <strong class="text-success text-lg">
                            <span class="text-dark">TOTAL DA COMPRA:</span>
                        </strong>
                    </div>
                    <div class="col-md-3 text-right">
                        <div class="d-flex justify-content-between">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input type="number" id="totalCompra" name="totalCompra" class="form-control " value=""
                                    placeholder="0,00" style="font-weight: bold;color:rgb(10, 156, 59);" readonly>
                            </div>
                        </div>
                    </div>
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
                    <input type="number" id="id_condicao" name="id_condicao" class="form-control ">
                </div>
                <div class="form-group  col-xl-10" id="ipt-cidade" required>
                    <label>Condição Pagamento *</label>
                    <div class="input-group">
                        <input class="form-control" name="condicao" id="condicao" value=""
                            style="text-transform:uppercase;" readonly>

                        <div class="input-group-append">
                            <button class="btn btn-dark btn-search" type="button" data-toggle="modal"
                                data-target=".modalShowCondicao">
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
                            <th class="text-center">Parcela</th>
                            <th class="text-center">Forma de Pagamento</th>
                            <th class="text-center">Vencimento</th>
                            <th class="text-center">Valor da Parcela</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center"></th>
                            <th class="text-center"></th>
                            <th class="text-center"></th>
                            <th class="text-center"></th>
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
                <input type="text" class="form-control form-control-sm" name="data_create" id="data_create" readonly>
            </div>
            <div class="form-group col-xl-2">
                <small>Alterado em:</small>
                <input type="text" class="form-control form-control-sm" name="data_alt" id="data_alt" readonly>
            </div>
        </div>
        <div class="text-right">
            <button type="button" class="btn btn-dark ">SALVAR</button>
            <a href="/compras" class="btn btn-dark">VOLTAR</a>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">DETALHES PRODUTOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@include('fornecedores.ShowFornecedores')
@include('condicaopagamento.showCondicaoPagamento')
@include('produtos.showProduto')
