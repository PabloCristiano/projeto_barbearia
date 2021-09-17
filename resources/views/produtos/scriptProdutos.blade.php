<script type="text/javascript">
$(function(){

    $('#tableProdutos').DataTable({
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
    var validator = $("#formProduto").validate();
    $('.alterar').on('click', function(){            
            validator.destroy();
            var cod = $(this).data('cod'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
            var produto = $(this).data('produto'); // vamos buscar o valor do atributo data-id
            var unidade = $(this).data('unidade');
            var id_categoria = $(this).data('id_categoria');
            var categoria = $(this).data('categoria');
            var id_fornecedor = $(this).data('id_fornecedor');
            var fornecedor  = $(this).data('fornecedor');
            var qtdestoque = $(this).data('qtdestoque');
            var precocusto = $(this).data('precocusto');
            var precovenda = $(this).data('precovenda');
            var custoultcompra = $(this).data('custoultcompra');
            var dataultcompra = $(this).data('dataultcompra');
            var dataultvenda = $(this).data('dataultvenda');            
            var DataCadastro = $(this).data('data_create');
            var DataAlteracao = $(this).data('data_alt');

            $("input").prop("disabled", false);//habilita os campos para digitar
            $("#id").val(cod); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#produto").val(produto); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#unidade").val(unidade); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#id_categoria").val(id_categoria); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#categoria").val(categoria); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#id_fornecedor").val(id_fornecedor); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#fornecedor").val(fornecedor); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#qtdEstoque").val(qtdestoque); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#precoCusto").val(precocusto); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#precoVenda").val(precovenda); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#custoUltCompra").val(custoultcompra); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#dataUltCompra").val(dataultcompra); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#dataUltVenda").val(dataultvenda); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_create").val(DataCadastro); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_alt").val(DataAlteracao); // inserir na o nome na pergunta de confirmação dentro da modal

            $(".modal-header").css("background-color", "#343a40");
            $(".modal-header").css("color", "white" );
            $(".btn.btn-dark.btnproduto").text("ALTERAR");
            $(".titleproduto").text(" Editar Produto ");
            $('#formProduto').attr('method', 'post');
            $('#formProduto').attr('action', '/produto/alterar');
            $('.modalproduto').modal('show'); // modal aparece
        });


        $('.excluir').on('click', function(){
            validator.destroy();
            var cod = $(this).data('cod'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
            var produto = $(this).data('produto'); // vamos buscar o valor do atributo data-id
            var unidade = $(this).data('unidade');
            var id_categoria = $(this).data('id_categoria');
            var categoria = $(this).data('categoria');
            var id_fornecedor = $(this).data('id_fornecedor');
            var fornecedor  = $(this).data('fornecedor');
            var qtdestoque = $(this).data('qtdestoque');
            var precocusto = $(this).data('precocusto');
            var precovenda = $(this).data('precovenda');
            var custoultcompra = $(this).data('custoultcompra');
            var dataultcompra = $(this).data('dataultcompra');
            var dataultvenda = $(this).data('dataultvenda');            
            var DataCadastro = $(this).data('data_create');
            var DataAlteracao = $(this).data('data_alt');

            $("input").prop("disabled", true);//habilita os campos para digitar
            $('input[type="search"]').prop("disabled", false);
            $("#id").val(cod); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#produto").val(produto); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#unidade").val(unidade); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#id_categoria").val(id_categoria); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#categoria").val(categoria); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#id_fornecedor").val(id_fornecedor); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#fornecedor").val(fornecedor); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#qtdEstoque").val(qtdestoque); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#precoCusto").val(precocusto); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#precoVenda").val(precovenda); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#custoUltCompra").val(custoultcompra); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#dataUltCompra").val(dataultcompra); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#dataUltVenda").val(dataultvenda); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_create").val(DataCadastro); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_alt").val(DataAlteracao); // inserir na o nome na pergunta de confirmação dentro da modal

            $(".modal-header").css("background-color", "#343a40");
            $(".modal-header").css("color", "white" );
            $(".btn.btn-dark.btnproduto").text("EXCLUIR");
            $(".titleproduto").text(" Excluir Produto ");
            $('#formProduto').attr('method', 'get');
            $('#formProduto').attr('action', '/produto/excluir/' + cod);
            $('.modalproduto').modal('show'); // modal aparece

            
        });

        $("#btnaddproduto").click(function(){
            $("#formProduto").validate();
            $('#formProduto').attr('method', 'post');
            $('#formProduto').attr('action', '/produto');
            $(".titleproduto").text(" Cadastrar Produto ");
            $(".btn.btn-dark.btnproduto").text("SALVAR");
            $("input").prop("disabled", false);
            $("#formProduto").trigger("reset");

        });

                    
                               
                  

       

});
</script>