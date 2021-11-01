<div class="modal fade modalShowCondicao" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-list"></i>
                        <h3 class="ml-3 mb-0"> Condição de Pagamento </h3>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <div class="card-body">
                    <table id="showCondicaoPagamento" class="table table-hover table-striped shadow-xs rounded"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Condição de Pagamento</th>
                                <th>Juros</th>
                                <th>Multa</th>
                                <th>Desconto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
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
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-dark" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        showCondicaoPagamento = $('#showCondicaoPagamento').DataTable({
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
            },
            "ajax": {
                "url": "{{ route('showCondicaoPagamento') }}",
                "method": 'get',
                "dataSrc": ""
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "condicao_pagamento"
                },
                {
                    "data": "juros"
                },
                {
                    "data": "multa"
                },
                {
                    "data": "desconto"
                }
            ]

        });
        $(document).on("click", "#showCondicaoPagamento tbody tr", function() {
            fila = $(this).closest("tr");
            id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
            condicao = fila.find('td:eq(1)').text();
            $("#id_condicao").val(id);
            $("#condicao").val(condicao);
            $('.modalShowCondicao').modal('toggle');
        });

        $("#id_condicao").autocomplete({
            source: function(resquest, response) {
                $.ajax({
                    url: "{{ route('searchCondicaoPagamento') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        _token: '{!! csrf_token() !!}',
                        search: resquest.term
                    },
                    success: function(data) {
                        console.log(data);
                        $('#id_condicao').val(data.id);
                        $('#condicao').val(data.condicao_pagamento);
                    },
                    error: function(data) {
                        return false;
                    }
                });
            },
        });
    });
</script>
