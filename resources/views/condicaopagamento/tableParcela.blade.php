{{-- <div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fa fa-list"></i>
                <h5 class="ml-3 mb-0">Parcela Condição de Pagamento</h5>
            </div>
<!--
            <div class="float-right">              
                <button type="button" class="btn btn-dark btnaddparcela" data-toggle="modal" data-target=".modalparcela"><i class="fa fa-plus"></i> Adicionar Parcela</button> 
            </div>
        -->            
        </div>
    </div>
    <div class="card-body"><!-- inicio card-body-->
   
    <div class="table-responsive">
        <table id="tableparcela" class="table table-hover table-striped shadow-xs rounded" style="width:100%">
            <thead>
                <tr>
                    <th>Parcela</th>
                    <th>Prazo</th>
                    <th>Percentual</th>
                    <th>Forma de Pagamento</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
               
            </tbody>    
        </table>
    </div>
 
   </div><!--FIM Card-Boddy-->
</div> --}}

<div class="card">
    <div class="card-body p-0">
        <table id="parcelas-table" class="table table-striped table-borderless border-right w-100">
            <thead>
                <tr>
                    <th>Parcela</th>
                    <th>Prazo*</th>
                    <th>Porcentagem*</th>
                    <th>Forma de Pagamento *</th>
                    <th class="text-center pl-05">Ações</th>
                </tr>
            </thead>
            <tbody>
                {{-- @if (isset($condicaoPagamento) && $condicaoPagamento->getTotalParcelas() > 0)
                    @foreach ($condicaoPagamento->getParcelas() as $i => $parcela)
                        <tr>
                            <td class="d-none parcela_id"></td>
                            <td>
                                <input type="number" class="form-control numero-parcela" name="parcela" value=""
                                    required readonly>
                            </td>
                            <td>
                                <div class="form-row">
                                    <div class="form-group col-xl-2">
                                        <input type="text" placeholder="Cód." class="form-control forma-pagamento-id"
                                            name="idformapg" id="idformapg"
                                            data-input="#forma_pagamento_{{ $i }}"
                                            data-route="formas-pagamento" value="teste" readonly required>
                                    </div>

                                    <div class="form-group col-md-10">
                                        <div class="input-group">

                                            <input type="text" class="form-control forma-pagamento"
                                                name="forma_pagamento[]" id="forma_pagamento_{{ $i }}"
                                                value="" min="1" step="1"  readonly required>

                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-search" type="button"
                                                    data-input="#forma_pagamento_id" data-route="formas-pagamento"
                                                    data-toggle="modal" data-target="#modal-formas-pagamento" disabled>
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input type="number" class="form-control prazo" name="prazo[]" min="1" max="180"
                                    step="1" value="" readonly required>
                            </td>
                            <td>
                                <input type="number" class="form-control porcentagem" name="porcentagem[]" min="0"
                                    max="100" value="" readonly required>
                            </td>

                            <td class="text-center">
                                <div class="btn-group-sm py-1">
                                    <button type="button" class="btn btn-success add" data-toggle="tooltip"
                                        data-placement="left" title="Adicionar" style="display: none">
                                        <i class="fa fa-check"></i>
                                    </button>

                                    <button type="button" class="btn btn-warning edit" data-toggle="tooltip"
                                        data-placement="left" title="Editar">
                                        <i class="fa fa-edit text-white"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger delete" data-toggle="tooltip"
                                        data-placement="left" title="Remover">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                @endif --}}
            </tbody>
        </table>
    </div>
</div>
<br>
<div class="float-right">
    <button type="button" class="btn btn-block btn-dark add-new">Adicionar Parcela</button>
</div>
