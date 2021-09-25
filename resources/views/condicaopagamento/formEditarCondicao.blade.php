@if (isset($listacondicao))
    @foreach ($listacondicao as $condicaopagamento)
        <div class="card col-10 p-0  mx-auto">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h3 class="ml-3 mb-0">Editar Condição de Pagamento</h3>
                </div>
            </div>
            <div class="card-body">
                <form id="formEditarCondicao" action="#" method="post">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-xl-2">
                            <label>Código</label>
                            <input type="number" id="id" name="id" class="form-control"
                                value="{{ $condicaopagamento->getId() }}" readonly />
                        </div>

                        <div class="form-group required col-xl-4">
                            <label>Condição de Pagamento *</label>

                            <input type="text" id="condicao_pagamento" name="condicao_pagamento" class="form-control"
                                value="{{ $condicaopagamento->getCondicaoPagamento() }}" required />
                        </div>

                        <div class="form-group col-xl-2">
                            <label>Juros</label>

                            <div class="input-group">
                                <input type="number" id="juros" name="juros" class="form-control "
                                    value="{{ $condicaopagamento->getJuros() }}" />
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-xl-2">
                            <label>Multa</label>

                            <div class="input-group">
                                <input type="number" id="multa" name="multa" class="form-control "
                                    value="{{ $condicaopagamento->getMulta() }}" />
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-xl-2">
                            <label>Desconto</label>
                            <div class="input-group">
                                <input type="number" id="desconto" name="desconto" class="form-control "
                                    value="{{ $condicaopagamento->getDesconto() }}" />
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="input-group col-xl-4">
                            <input class="form-control" type="text" id="total_parcelas" name="total_parcelas"
                                value="{{ $condicaopagamento->getTotalParcelas() }}" hidden />
                        </div>
                    </div>
                    <div class="table-wrapper mb-4">
                        @include('condicaopagamento.tableParcela')
                        <table id="example" class="display" width="100%"></table>
                    </div>

                    <div class="card-footer text-center mx-auto">
                        <button type="submit" class="btn btn-dark ">EDITAR</button>
                        <a type="button" class="btn btn-dark" href="/Condicaopagamento">VOLTAR</a>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endif
