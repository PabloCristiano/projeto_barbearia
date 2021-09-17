<script type="text/javascript">
    $(function() {

        $(document).ready(function() {
            $('#tablecidade').DataTable({
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
        var validator = $("#modalFormcidade").validate();
        $('.alterar').on('click', function() {
            validator.destroy();
            $("#modalFormcidade").validate();
            var cod = $(this).data(
                'cod'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
            var cidade = $(this).data('cidade'); // vamos buscar o valor do atributo data-id
            var cidade_ddd = $(this).data('ddd');
            var cidade_estado = $(this).data('cidade_estado');
            var cidade_estado_id = $(this).data('cidade_estado_id');
            var DataCadastro = $(this).data('data_create');
            var DataAlteracao = $(this).data('data_alt');
            $("input").prop("disabled", false); //habilita os campos para digitar
            $("#cidade_id").val(cod); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#cidade_cidade").val(
                cidade); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#cidade_ddd").val(
                cidade_ddd); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#cidade_estado_id").val(
                cidade_estado_id); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#cidade_estado").val(
                cidade_estado); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_create").val(
                DataCadastro); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_alt").val(
                DataAlteracao); // inserir na o nome na pergunta de confirmação dentro da modal
            $(".modal-header").css("background-color", "#343a40");
            $(".modal-header").css("color", "white");
            $(".btn.btn-dark.btncidade").text("ALTERAR");
            $(".modal-titlecidade").text(" Editar Cidade ");
            $('#modalFormcidade').attr('method', 'post');
            $('#modalFormcidade').attr('action', '/cidade/alterar');
            $('.modalcidade').modal('show'); // modal aparece
        });

        $('.excluir').on('click', function() {
            var cod = $(this).data(
                'cod'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
            var cidade = $(this).data('cidade'); // vamos buscar o valor do atributo data-id
            var cidade_ddd = $(this).data('ddd');
            var cidade_estado = $(this).data('cidade_estado');
            var cidade_estado_id = $(this).data('cidade_estado_id');
            var DataCadastro = $(this).data('data_create');
            var DataAlteracao = $(this).data('data_alt');
            $("input").prop("disabled", true); //habilita os campos para digitar
            $('input[type="search"]').prop("disabled", false);
            $("#cidade_id").val(cod); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#cidade_cidade").val(
                cidade); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#cidade_ddd").val(
                cidade_ddd); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#cidade_estado_id").val(
                cidade_estado_id); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#cidade_estado").val(
                cidade_estado); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_create").val(
                DataCadastro); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_alt").val(
                DataAlteracao); // inserir na o nome na pergunta de confirmação dentro da modal
            $(".modal-header").css("background-color", "#343a40");
            $(".modal-header").css("color", "white");
            $(".btn.btn-dark.btncidade").text("EXCLUIR");
            $(".modal-titlecidade").text(" Excluir Cidade ");
            $('#modalFormcidade').attr('method', 'get');
            $('#modalFormcidade').attr('action', '/cidade/excluir/' + cod);
            $('.modalcidade').modal('show'); // modal aparece




        });

        $(".btn-addcidade").click(function() {
            $('#modalFormcidade').validate({});
            $('#modalFormcidade').attr('method', 'post');
            $('#modalFormcidade').attr('action', '/cidade');
            $(".modal-titlecidade").text(" Cadastrar Cidade ");
            $(".btn.btn-dark.btncidade").text("SALVAR");
            $("input").prop("disabled", false);
            $("#modalFormcidade").trigger("reset");
        });
        //Limpar Fomulario


        // $(function() {
        //     var teste = $.ajax({
        //         url: "{{ route('testepablo.testepablo') }}",
        //         type: 'GET',
        //         dataType: 'JSON',
        //         success: function(data) {
        //            console.log(data.data[0].id)        
        //            console.log(data.data[0].cidade)        
        //            console.log(data.data[0].ddd)        
        //            console.log(data.data[0].id_estado)        
        //            console.log(data.data[0].estado)        
        //            console.log(data.data[0].data_create)        
        //            console.log(data.data[0].data_alt)        
        //         },
        //         error: function() {


        //         }

        //     });
            
        // });

    });
</script>
