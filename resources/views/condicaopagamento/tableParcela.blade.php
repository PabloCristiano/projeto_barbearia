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
                @if (@isset($condicaopagamento) && $condicaopagamento->getParcelas() > 0 )
                @foreach ($condicaopagamento->getParcelas() as $i => $getParcela)
                        <tr class="trparcela">
                            <td class="col-1">
                                <input type="number" class="form-control numero-parcela" name="parcela[]" value="{{$getParcela->getParcela()}}" id="parcela" readonly>
                            </td>
                            <td class="col-2">
                                <input type="number" class="form-control prazo" name="prazo[]" min="1" step="1" id="prazo" placeholder="Prazo" value="{{$getParcela->getPrazo()}}" disabled>
                            </td>
                            <td class="col-1">
                                <input type="number" class="form-control porcentagem" name="porcentagem[]" value="{{$getParcela->getPorcentagem()}}" min="1" max="100" step=".01" id="porcentagem" placeholder="%" disabled>
                            </td>
                            <td class="col-6">
                                <div class="form-row">
                                    <div class="form-group col-3">
                                        <input type="number" class="form-control forma-pagamento-id" name="idformapg[]" id="id_forma_pagamento_{{ $i }}" placeholder="Codigo" value="{{$getParcela->getFormaPagamento()->getid()}}" disabled>
                                    </div <div class="form-group">
                                    <div class="input-group col-9">
                                        <input type="text" class="form-control forma-pagamento" name="forma_pagamento[]" id="forma_pagamento_{{ $i }}" placeholder="Forma de pagamento" value="{{$getParcela->getFormaPagamento()->getFormapg()}}" readonly>
                                        <div class="input-group-append" >
                                            <button class="btn btn-dark btn-search" type="button" data-input="" data-route="" data-toggle="modal" data-target=".modalShowFormapg" disabled>
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                             </div>
                            </td>
                            <td class="col-2 text-center">
                                <div class="btn-group-sm">
                                    <button type="button" class="btn btn-success add" title="Adicionar" style="display: none">
                                        <i class="fa fa-check"></i>
                                    </button>
                                    <button id="CondEditar" type="button" class="btn btn-warning edit" title="Editar" >
                                        <i class="fa fa-edit text-white"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger delete" title="Remover">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                @endforeach
                @else 
                @endif
            </tbody>
            </table>            
        </div>
     </div>
<br>
<div class="float-right">
    <button id="add-newEditar" type="button" class="btn btn-block btn-dark add-new">Adicionar Parcela</button>
</div>
