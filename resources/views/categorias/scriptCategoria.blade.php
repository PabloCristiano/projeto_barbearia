<script type="text/javascript">
$(function(){

    $(document).ready(function() {
            $('#tableCategoria').DataTable({
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

        var validator = $("#formCategoria").validate();
        $('.alterar').on('click', function(){
            validator.destroy();
            $('#formCategoria').validate({});
            var cod = $(this).data('cod'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
            var categoria = $(this).data('categoria'); // vamos buscar o valor do atributo data-id
            var DataCadastro = $(this).data('data_create');
            var DataAlteracao = $(this).data('data_alt');
            $("input").prop("disabled", false);//habilita os campos para digitar
            $("#id").val(cod); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#categoria").val(categoria); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_create").val(DataCadastro); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_alt").val(DataAlteracao); // inserir na o nome na pergunta de confirmação dentro da modal
            $(".modal-header").css("background-color", "#343a40");
            $(".modal-header").css("color", "white" );
            $(".btn.btn-dark.btncategoria").text("ALTERAR");
            $(".modal-titlecategoria").text(" Alterar Categoria ");
            $('#formCategoria').attr('method', 'post');
            $('#formCategoria').attr('action', '/categoria/alterar');
            $('.modalcategoria').modal('show'); // modal aparece
        });

        $('.excluir').on('click', function(){
            validator.destroy();
            var cod = $(this).data('cod'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
            var categoria = $(this).data('categoria'); // vamos buscar o valor do atributo data-id
            var DataCadastro = $(this).data('data_create');
            var DataAlteracao = $(this).data('data_alt');
            $("input").prop("disabled", true);//habilita os campos para digitar
            $('input[type="search"]').prop("disabled", false);
            $("#id").val(cod); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#categoria").val(categoria); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_create").val(DataCadastro); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_alt").val(DataAlteracao); // inserir na o nome na pergunta de confirmação dentro da modal
            $(".modal-header").css("background-color", "#343a40");
            $(".modal-header").css("color", "white" );
            $(".btn.btn-dark.btncategoria").text("EXCLUIR");
            $(".modal-titlecategoria").text(" Excluir Categoria ");
            $('#formCategoria').attr('method', 'get');
            $('#formCategoria').attr('action', '/categoria/excluir/' + cod);
            $('.modalcategoria').modal('show'); // modal aparece
        });

        $(".btn-addcategoria").click(function(){
            $('#formCategoria').validate({});
            $('#formCategoria').attr('method', 'post');
            $('#formCategoria').attr('action', '/categoria');
            $(".modal-titlecategoria").text(" Cadastrar Categoria ");
            $(".btn.btn-dark.btncategoria").text("SALVAR");
            $("input").prop("disabled", false);
            $("#formCategoria").trigger("reset");    
        });


























});
</script>