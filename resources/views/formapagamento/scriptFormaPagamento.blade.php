<script type="text/javascript">
    $(function(){
        
            $(document).ready(function() {
                $('#tableformapagamento').DataTable({
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
        
            });
             var validator = $("#modalFormFormapg").validate({});
    
            $('.alterar').on('click', function(){
                var id = $(this).data('id'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
            var forma_pg = $(this).data('nome'); // vamos buscar o valor do atributo data-id
            var DataCadastro = $(this).data('data_create');
            var DataAlteracao = $(this).data('data_alt');
            validator.destroy();
            $("#modalFormFormapg").validate({});
            $("input").prop("disabled", false);//habilita os campos para digitar
            $("#formapg_id").val(id); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#formapg_forma_pg").val(forma_pg); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_create").val(DataCadastro); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_alt").val(DataAlteracao); // inserir na o nome na pergunta de confirmação dentro da modal
            $(".modal-header").css("background-color", "#343a40");
            $(".modal-header").css("color", "white" );
            $(".btn.btn-dark.btnformapg").text("ALTERAR");
            $(".modal-titleformapg").text(" Editar Forma de Pagamento ");
            $('#modalFormFormapg').attr('method', 'post');
            $('#modalFormFormapg').attr('action', '/formapagamento/alterar');
            $('.modalformapg').modal('show'); // modal aparece
        });

        $('.excluir').on('click', function(){
            var id = $(this).data('id'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
            var forma_pg = $(this).data('nome'); // vamos buscar o valor do atributo data-id
            var DataCadastro = $(this).data('data_create');
            var DataAlteracao = $(this).data('data_alt');
            validator.destroy();
            $("input").prop("disabled", true);//habilita os campos para digitar
            $('input[type="search"]').prop("disabled", false);
            $("#formapg_id").val(id); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#formapg_forma_pg").val(forma_pg); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_create").val(DataCadastro); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_alt").val(DataAlteracao); // inserir na o nome na pergunta de confirmação dentro da modal
            $(".modal-header").css("background-color", "#343a40");
            $(".modal-header").css("color", "white" );
            $(".btn.btn-dark.btnformapg").text("EXCLUIR");
            $(".modal-titleformapg").text(" Excluir Forma de Pagamento ");
            $('#modalFormFormapg').attr('method', 'get');
            $('#modalFormFormapg').attr('action', '/formapagamento/excluir/' + id);
            $('.modalformapg').modal('show'); // modal aparece
        });

        $(".btnaddformapg").click(function(){
            $("#modalFormFormapg").validate({});
            $('#modalFormFormapg').attr('method', 'POST');
            $('#modalFormFormapg').attr('action', '/formapagamento');
            $(".modal-titleformapg").text(" Cadastrar Forma de Pagamento ");
            $(".btn.btn-dark.btnformapg").text("SALVAR");
            $("input").prop("disabled", false);
            $("#modalFormFormapg").trigger("reset");    
        });       
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    });
    </script>