<script type="text/JavaScript">
$(function(){
    $(document).ready(function() {
        $('#tableCompra').DataTable({
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
    $("#id_fornecedor").blur(function(){
        if($("#num_nota").val() > 0 & $("#id_fornecedor").val() > 0 ){
          $("#btnSearchProduto").prop("disabled", false);  
        }else{
            $("#btnSearchProduto").prop("disabled", true); 
        }
    });
    $("#num_nota").blur(function(){
        if($("#num_nota").val() > 0 & $("#id_fornecedor").val() > 0 ){
          $("#btnSearchProduto").prop("disabled", false);  
        }else{
            $("#btnSearchProduto").prop("disabled", true); 
        }
    });
    $("#id_fornecedor").keyup(function(){
        $("#fornecedor").val('');
    });

    

});
</script>