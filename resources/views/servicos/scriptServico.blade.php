<script type="text/javascript">
$(function(){


    $(document).ready(function() {
            $('#tableservicos').DataTable({
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

        //BOTÃO EXCLUIR SERVICO
        $('.deleteservico').on('click', function(){
            var id = $(this).data('id'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
            var servico = $(this).data('servico'); // vamos buscar o valor do atributo data-id
            var servico_tempo = $(this).data('tempo');
            var servico_valor = $(this).data('valor');
            var servico_comissao = $(this).data('comissao');
            var servico_observacoes = $(this).data('observacoes');
            var DataCadastro = $(this).data('data_create');
            var DataAlteracao = $(this).data('data_alt');
            $("input").prop("disabled", true);//habilita os campos para digitar
            $("textarea").prop("disabled", true);
            $('input[type="search"]').prop("disabled", false);
            $("#servico_id").val(id); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#servico_servico").val(servico); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#servico_tempo").val(servico_tempo); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#servico_valor").val(servico_valor); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#servico_comissao").val(servico_comissao); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#servico_observacoes").val(servico_observacoes); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#servico_data_create").val(DataCadastro); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#servico_data_alt").val(DataAlteracao); // inserir na o nome na pergunta de confirmação dentro da modal
            $(".modal-header").css("background-color", "#343a40");
            $(".modal-header").css("color", "white" );
            $(".btn.btn-dark.btnservico").text("EXCLUIR");
            $(".modal-titleservico").text(" Excluir Serviço ");
            $('#formservico').attr('method', 'get');
            $('#formservico').attr('action', '/servico/excluir/' + id);
            $('.modalservico').modal('show'); // modal aparece
        });

        //BOTÃO ALTERAR SERVIÇO
        $('.alterarservico').on('click', function(){
            var id = $(this).data('id'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
            var servico = $(this).data('servico'); // vamos buscar o valor do atributo data-id
            var servico_tempo = $(this).data('tempo');
            var servico_valor = $(this).data('valor');
            var servico_comissao = $(this).data('comissao');
            var servico_observacoes = $(this).data('observacoes');
            var DataCadastro = $(this).data('data_create');
            var DataAlteracao = $(this).data('data_alt');
            $("input").prop("disabled", false);//habilita os campos para digitar           
            $("textarea").prop("disabled", false);
            $("#servico_id").val(id); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#servico_servico").val(servico); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#servico_tempo").val(servico_tempo); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#servico_valor").val(servico_valor); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#servico_comissao").val(servico_comissao); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#servico_observacoes").val(servico_observacoes); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#servico_data_create").val(DataCadastro); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#servico_data_alt").val(DataAlteracao); // inserir na o nome na pergunta de confirmação dentro da modal
            $(".modal-header").css("background-color", "#343a40");
            $(".modal-header").css("color", "white" );
            $(".btn.btn-dark.btnservico").text("ALTERAR");
            $(".modal-titleservico").text(" Editar Servico ");
            $('#formservico').attr('method', 'post');
            $('#formservico').attr('action', '/servico/alterar/');
            $('.modalservico').modal('show'); // modal aparece
        });










        $(".btn-addservico").click(function(){
            $('#formservico').attr('method', 'post');
            $('#formservico').attr('action', '/servico');
            $(".modal-titleservico").text(" Cadastrar Serviço ");
            $(".btn.btn-dark.btnservico").text("SALVAR");
            $("input").prop("disabled", false);
            $("textarea").prop("disabled", false);
            $("#formservico").trigger("reset");    
        });
        








});
</script>