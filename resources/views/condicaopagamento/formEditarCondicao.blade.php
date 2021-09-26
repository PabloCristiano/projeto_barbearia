@if (isset($listacondicao))
    @foreach ($listacondicao as $condicaopagamento)
        <div class="card col-10 p-0  mx-auto">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h3 class="ml-3 mb-0">Editar Condição de Pagamento</h3>
                </div>
            </div>
            <div class="card-body">
                <form id="formEditarCondicao" action="{{ Route('condicaoPagamentoEdit') }}" method="post">
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
                    <input type="text" id="parcelas_array" name="parcelas_array[]" value="" hidden />
                    <div class="table-wrapper mb-4">
                        @include('condicaopagamento.tableParcela')
                        <table id="example" class="display" width="100%"></table>
                    </div>

                    <div class="card-footer text-center mx-auto">
                        <button id="btnEnviar" type="Button"
                            class="btn btn-dark btnEditarCondPagamento ">EDITAR</button>
                        <a type="button" class="btn btn-dark" href="/Condicaopagamento">VOLTAR</a>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endif
@include('formapagamento.showFormaPagamento')
<script type="text/javascript">
    $(function() {
        function validador() {
            alert('Deubom');
        }

        $(".btnEditarCondPagamento").on('click', function() {
            var teste = false;

            if (teste === true) {
                var parcelas = setparcela();
                $("#parcelas_array").val(parcelas);
                console.log(parcelas)
            } else {
                var parcelas = setparcela();
                $("#parcelas_array").val(parcelas);
                $(this).attr("type", "submit");
            }

        });

        const row =
            `<tr class = "trparcela">
                <td class="col-1" >
                    <input
                        type="number"
                        class="form-control numero-parcela"
                        name="parcela[]"
                        value=""
                        id="parcela"                    
                        readonly
                    >
                </td>
                        
                <td class="col-2">
                    <input
                        type="number"
                        class="form-control prazo"
                        name="prazo[]"
                        min="1"
                        step="1"
                        id="prazo"
                        placeholder="Prazo"
                        
                        
                    >
                </td>
                <td class="col-1">
                    <input
                        type="number"
                        class="form-control porcentagem"
                        name="porcentagem[]"
                        value=""
                        min="1"
                        max="100"
                        step=".01"
                        id="porcentagem" 
                        placeholder="%"                   
                        
                    >
                </td>           
            <td class="col-6">
             <div class="form-row">
                <div class="form-group col-3">
                    <input
                        type="number"
                        class="form-control forma-pagamento-id"
                        name="idformapg[]"                       
                        id="idformapg"                   
                        placeholder="Codigo"
                    >
                </div           
                <div class="form-group">
                  <div class="input-group col-9">            
                        <input
                            type="text"
                            class="form-control forma-pagamento"
                            name="formapg"
                            id="formapg[]" 
                            placeholder="Forma de pagamento"
                            readonly
                        
                        >
                        <div class="input-group-append">
                                <button
                                    class="btn btn-dark btn-search"
                                    type="button"
                                    data-input=""
                                    data-route=""
                                    data-toggle="modal"
                                    data-target=".modalShowFormapg"
                                >
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                </div>        
                </div>
             </div>   
            </td>
           
            <td class="col-2 text-center" >
                <div class="btn-group-sm">
                    <button type="button" class="btn btn-success add" title="Adicionar">
                        <i class="fa fa-check"></i>
                    </button>
                    <button type="button" class="btn btn-warning edit" title="Editar" style="display: none">
                        <i class="fa fa-edit text-white"></i>
                    </button>
                    <button type="button" class="btn btn-danger delete" title="Remover">
                        <i class="fa fa-trash-alt"></i>
                    </button>
                </div>
            </td>
        </tr>`;

        function getPercentualAtual() {
            let percentual = 0;
            $(".porcentagem").map(function(index, item) {
                percentual += Number($(item).val());
                // if (Math.round(percentual) === 100)
                //     percentual = 100;
            });

            return percentual;
        }
        var parcelas = Number($("#total_parcelas").val());

        $("#add-newEditar").click(function() {
            if (getPercentualAtual() === 100) {
                swal("Não é possível adicionar mais parcelas");
                return false;
            }

            $(this).attr("disabled", "disabled");
            $('.btnEditarCondPagamento').attr("disabled", "disabled");

            //parcelas++;
            if (parcelas === 1)
                $("#parcelas-table .dataTables_empty").parent().remove();
            let newRow = $(row).clone();
            parcelas = parseInt(parcelas) + 1
            newRow.find(".numero-parcela").val(parcelas);
            $("#parcelas-table tbody").append(newRow);
            newRow.find(".add").show();
            newRow.find(".edit").hide();
            const prevRow = newRow.prev();
            window.index = parcelas;


            newRow.find(".forma-pagamento-id").attr("id", `id_forma_pagamento_${parcelas}`);
            newRow.find(".forma-pagamento").attr("id", `forma_pagamento_${parcelas}`);
            prevRow.find(".btn-search").attr("disabled", "disabled");

        });
        //função para pegar id_forma_pagamento e forma_pagamento
        $(document).on("click", "#tableShowFormapg tbody tr", function() {
            fila = $(this).closest("tr");
            id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
            formapg = fila.find('td:eq(1)').text();
            $(`#id_forma_pagamento_${index}`).val(id);
            $(`#forma_pagamento_${index}`).val(formapg);
            $('.modalShowFormapg').modal('toggle');

        });

        $(document).on("click", ".add", function(e) {
            let empty = false;
            const inputs = $(this).parents("tr").find(".form-control");
            inputs.each(function() {
                if (!$(this).val()) {
                    $(this).addClass("is-invalid");
                    empty = true;
                } else {
                    $(this).removeClass("is-invalid");
                }
            });
            $(this).parents("tr").find(".is-invalid").first().focus();
            if (!empty) {
                if (getPercentualAtual() > 100) {
                    swal("O percentual das parcelas não podem exceder a 100%");
                    return false;
                }
                inputs.each(function() {
                    $(this).attr("readonly", true);
                    $(this).parents('.input-group').find('.btn-search').prop('disabled', true);
                });
                $(this).hide();
                $(".add-new").removeAttr("disabled");
                $(".btnformapg").removeAttr("disabled");
                $(".btnEditarCondPagamento").removeAttr("disabled");

                $(this).parents("tr").find(".edit, .delete").show();
            }
        });

        // Edit row on edit button click
        $(document).on("click", ".edit", function() {
            console.log('show Edit')
            window.index = parseInt($(this).parents("tr").find(".numero-parcela").prop("value")) - 1;
            $(this).parents("tr").find(".btn-search, .form-control").not(".numero-parcela").each(
                function() {
                    $(this).prop("readonly", false);
                    $(this).prop("disabled", false);
                });
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").prop("disabled", "disabled");
            $(".btnformapg").prop("disabled", "disabled");
            $(".btnEditarCondPagamento").prop("disabled", "disabled");
        });

        $(document).on("click", ".delete", function() {
            const tr = $(this).parents("tr");
            // tr.prev().find(".btn").removeAttr("disabled");
            tr.remove();
            $("#total_parcelas").val(--parcelas);
            $("#parcelas-table tr").each(function() {
                $(this).find('.numero-parcela').val($(this).index() + 1);
            })
            $(".add-new").removeAttr("disabled");
            $(".btnformapg").removeAttr("disabled");
        });

        function setparcela() {
            const tr = document.querySelectorAll('.trparcela');
            const qtdparcela = tr.length;
            const arr = [];
            for (let j = 0; j < qtdparcela; j++) {
                const input = tr[j].querySelectorAll('td input');
                var parcela = input[0].value;
                var prazo = input[1].value;
                var porcentagem = input[2].value;
                var idformapg = input[3].value;
                arr.push({
                    parcela,
                    prazo,
                    porcentagem,
                    idformapg
                });
            }
            var parcelas = JSON.stringify(arr)
            return parcelas;
        }
       
             


    });
</script>
