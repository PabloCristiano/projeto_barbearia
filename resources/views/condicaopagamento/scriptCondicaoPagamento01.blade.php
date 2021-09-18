<script type="text/javascript">
    $(document).ready(function() {


        tablecondicaopagamento = $('#tablecondicaopagamento').DataTable({
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados  por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                },
                "select": {
                    "rows": {
                        "_": "Selecionado %d linhas",
                        "0": "Nenhuma linha selecionada",
                        "1": "Selecionado 1 linha"
                    }
                },
                "buttons": {
                    "copy": "Copiar para a área de transferência",
                    "copyTitle": "Cópia bem sucedida",
                    "copySuccess": {
                        "1": "Uma linha copiada com sucesso",
                        "_": "%d linhas copiadas com sucesso"
                    }
                }
            }

        });

        $("#idformapg").autocomplete({
            source: function(resquest, response) {
                $.ajax({
                    url: "{{ route('searchFormaPagamento') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        _token: '{!! csrf_token() !!}',
                        search: resquest.term
                    },
                    success: function(data) {
                        $('#idformapg').val(data.id);
                        $('#formapg').val(data.forma_pg);

                    },
                    error: function(data) {
                        return false;
                    }
                });
            },
        });





        $('#modalFormCondicaopg').validate({
            rules: {
                condicao_pagamento: {
                    required: true
                }
            }
        });


        window.parc = []
        const row =
            `<tr class = "trparcela">
                <td class="col-1" >
                    <input
                        type="number"
                        class="form-control numero-parcela"
                        name="parcela"
                        value=""
                        id="parcela"                    
                        readonly
                    >
                </td>
                        
                <td class="col-2">
                    <input
                        type="number"
                        class="form-control prazo"
                        name="prazo"
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
                        name="porcentagem"
                        value=""
                        min="1"
                        max="100"
                        step=".01"
                        id="porcentagem" 
                        placeholder="%"                   
                        
                    >
                </td>           
            <td class="col-8">
             <div class="form-row">
                <div class="form-group col-3">
                    <input
                        type="number"
                        class="form-control forma-pagamento-id"
                        name="idformapg"                                         
                        placeholder="Codigo"
                        
                        readonly                        
                    >
                </div           
                <div class="form-group">
                  <div class="input-group col-9">            
                        <input
                            type="text"
                            class="form-control forma-pagamento"
                            name="formapg" 
                            placeholder="Forma de pagamento"
                            
                            readonly
                        
                        >
                        <div class="input-group-append">
                                <button
                                    id="btnpesquisar"
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
           
            <td class="col-1 text-right" >
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

        $("#modalFormCondicaopg").submit(function(event) {
            event.preventDefault();
            if (parcelas > 0 && getPercentualAtual() !== 100) {
                swal("O percentual das parcelas devem somar 100%");

                e.preventDefault();
                return false;
            }

            var validacao = $("#modalFormCondicaopg").valid();
            var parcelas = setparcela();
            console.log(parcelas);
            var id = $("#id").val();
            var condicao_pagamento = $("#condicao_pagamento").val();
            var juros = $("#juros").val();
            var multa = $("#multa").val();
            var desconto = $("#desconto").val();
            var data_create = $("#data_create").val();
            var data_alt = $("#data_alt").val();
            const tr = document.querySelectorAll('.trparcela');
            var total_parcelas = tr.length;
            var porcentagem = $("#porcentagem").val();
            console.log(total_parcelas);
            if (validacao === true) {

                if (porcentagem === 100) {
                    $.ajax({
                        url: "{{ route('cadparcela.cadparcela') }}",
                        type: 'POST',
                        data: {
                            _token: '{!! csrf_token() !!}',
                            id,
                            condicao_pagamento,
                            juros,
                            multa,
                            desconto,
                            data_create,
                            data_alt,
                            total_parcelas,
                            parcelas
                        },
                        dataType: 'JSON',
                        success: function(data) {

                            // console.log('sucess', data.data)
                            swal("Condição Cadastrado com Sucesso!");
                            $('#modalcondicaopg').modal('hide');


                        },
                        error: function(data) {

                            swal("ERROR");

                        },
                    });
                } else {
                    swal('Condição de pagamento deve Conter minímo uma Parcela');
                    // swal(totalporcentagem);
                }

            }

        });

        var parcelas = Number($("#total_parcelas").val());

        $('#parcelas-table').DataTable({
            dom: '<"row d-none"<"col-md-4"f>l>rtip',
            bSort: false,
            language: {
                emptyTable: 'Nenhuma parcela adicionada'
            }
        });


        $("#parcelas-table_wrapper .dataTables_paginate").remove();
        $("#parcelas-table_wrapper #parcelas-table_info").remove();

        // Append table with add row form on add new button click
        $(".add-new").click(function() {

            if (getPercentualAtual() === 100) {
                swal("Não é possível adicionar mais parcelas");

                return false;
            }

            $(this).attr("disabled", "disabled");

            parcelas++;

            if (parcelas === 1)
                $("#parcelas-table .dataTables_empty").parent().remove();

            let newRow = $(row).clone();

            newRow.find(".numero-parcela").val(parcelas);
            $("#parcelas-table tbody").append(newRow);

            newRow.find(".add").show();
            newRow.find(".edit").hide();

            const prevRow = newRow.prev();
            const index = prevRow.index() + 1;

            {{--  newRow.find(".forma-pagamento-id").attr("id", `id_`+`${index}`);
            newRow.find(".forma-pagamento").attr("id", `formapg_`+`${index}`);  --}}

            $(".forma-pagamento-id").attr("id", `id_`+`${index}`);
            $(".forma-pagamento").attr("id", `formapg_`+`${index}`);

            prevRow.find(".btn-search").attr("disabled", "disabled");

            console.log(index);
            console.log($('.forma-pagamento-id').attr("id"));
            console.log($('.forma-pagamento').attr("id"));

            $(document).on("click", "#tableShowFormapg tbody tr", function() {
                console.log(index);
                fila = $(this).closest("tr");
                id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
                formapg = fila.find('td:eq(1)').text();
    
                $(`#id_`+index).val(id);
                $(`#formapg_`+index).val(formapg);                
                $('.modalShowFormapg').modal('toggle');
               
            });  

        


        });

       






        //----------------------------------------------------------------------

        // Add row on add button click
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

                $(this).parents("tr").find(".edit, .delete").show();


            }



        });


        function getPercentualAtual() {
            let percentual = 0;

            $(".porcentagem").map(function(index, item) {
                percentual += Number($(item).val());

                // if (Math.round(percentual) === 100)
                //     percentual = 100;
            });

            return percentual;
        }

        // Edit row on edit button click
        $(document).on("click", ".edit", function() {
            $(this).parents("tr").find(".btn-search, .form-control").not(".numero-parcela").each(
                function() {
                    $(this).prop("readonly", false);
                    $(this).prop("disabled", false);
                });

            $(this).parents("tr").find(".add, .edit").toggle();

            $(".add-new").prop("disabled", "disabled");
        });

        // Delete row on delete button click
        $(document).on("click", ".delete", function() {
            const tr = $(this).parents("tr");

            // tr.prev().find(".btn").removeAttr("disabled");

            tr.remove();

            $("#total_parcelas").val(--parcelas);

            $("#parcelas-table tr").each(function() {
                $(this).find('.numero-parcela').val($(this).index() + 1);
            })

            $(".add-new").removeAttr("disabled");
        });

        $("form").keypress(function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                return false;
            }
        });

        // $('#form-condicao-pagamento').submit(function(e) {
        //     if (parcelas > 0 && getPercentualAtual() !== 100) {
        //         swal("O percentual das parcelas devem somar 100%");

        //         e.preventDefault();
        //         return false;
        //     }
        // });

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
            return arr;

        }



    });
</script>
@include('formapagamento.showFormaPagamento')
