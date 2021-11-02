<div class="modal fade modalbuscafornecedores" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-list"></i>
                        <h5 class="ml-3 mb-0"> Fornecedores </h5>
                    </div>

                    {{--  <div class="float-right">
                        <button type="button" class="btn btn-dark" data-toggle="modal"
                            data-target=".modalfornecedor"><i class="fa fa-plus"></i> Adicionar</button>
                    </div>  --}}
                </div>
            </div>
            <div class="table-responsive">
                <div class="card-body">
                    <table id="tablebuscafornecedores" class="table table-hover table-striped shadow-xs rounded"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Fornecedor</th>
                                <th>Nome Fantasia</th>
                                <th>Contado</th>
                                <th>Telefone</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if (@isset($fornecedores))
                                @foreach ($fornecedores as $Fornecedor)
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <th></th>
                                        <td></td>

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
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-dark" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        //função para popular datatable
        $(document).ready(function() {
            tablebuscafornecedores = $('#tablebuscafornecedores').DataTable({
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
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
                    "url": "{{ route('showfornecedor.showfornecedor') }}",
                    "method": 'get', //usamos el metodo POST
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "razaoSocial"
                    },
                    {
                        "data": "nomefantasia"
                    },
                    {
                        "data": "contato"
                    },
                    {
                        "data": "telefone"
                    }
                ]

            });

        });

        $("#FormFornecedor").validate();
        $("#FormFornecedor").submit(function() {
            event.preventDefault();
            var id = $(this).find("#id").val();
            var tipo_pessoa = $(this).find("#juridica").val();
            var razaoSocial = $(this).find("#razaoSocial").val();
            var nomefantasia = $(this).find("#nomefantasia").val();
            var logradouro = $(this).find("#logradouro").val();
            var numero = $(this).find("#numero").val();
            var complemento = $(this).find("#complemento").val();
            var bairro = $(this).find("#bairro").val();
            var cep = $(this).find("#cep").val();
            var id_cidade = $(this).find("#id_cidade").val();
            var whatsapp = $(this).find("#whatsapp").val();
            var telefone = $(this).find("#telefone").val();
            var email = $(this).find("#email").val();
            var pagSite = $(this).find("#pagSite").val();
            var contato = $(this).find("#contato").val();
            var cnpj = $(this).find("#cpf_cnpj").val();
            var ie = $(this).find("#rg_inscricao_estadual").val();
            var cpf = $(this).find("#cpf_cnpj").val();
            var rg = $(this).find("#rg_inscricao_estadual").val();
            var id_condicaopg = $(this).find("#id_condicaopg").val();
            var limitecredito = $(this).find("#limitecredito").val();
            var obs = $(this).find("#obs").val();


            $.ajax({
                url: "{{ route('registrofornecedor.registrofornecedor') }}",
                type: 'POST',
                data: {
                    _token: '{!! csrf_token() !!}',
                    id,
                    tipo_pessoa,
                    razaoSocial,
                    nomefantasia,
                    logradouro,
                    numero,
                    complemento,
                    bairro,
                    cep,
                    id_cidade,
                    whatsapp,
                    telefone,
                    email,
                    pagSite,
                    contato,
                    cnpj,
                    ie,
                    cpf,
                    rg,
                    id_condicaopg,
                    limitecredito,
                    obs
                },
                dataType: 'JSON',
                success: function(data) {
                    tablebuscafornecedores.ajax.reload(null, false);
                    console.log(data);
                    $("#FormFornecedor").trigger("reset");
                    swal("Fonecedor Cadastrado com Sucesso !");
                    $('.modalfornecedor').modal('toggle');
                },
                error: function(data) {
                    console.log(data);
                    swal("Fonecedor não Cadastrado !");

                },
            });

        });

        $(document).on("click", "#tablebuscafornecedores tbody tr", function() {
            fila = $(this).closest("tr");
            id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
            categoria = fila.find('td:eq(1)').text();
            // ddd = fila.find('td:eq(2)').text();
            
            $("#id_fornecedor").val(id);
            $("#fornecedor").val(categoria);
            $('.modalbuscafornecedores').modal('toggle');
            $("#id_fornecedor").focus();
        });

    });
</script>
