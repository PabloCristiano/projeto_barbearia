<script type="text/javascript">
    $(function() {

        $(document).ready(function() {
            $('#tableCliente').DataTable({
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

        var validator = $("#FormCliente").validate();

        $('.alterar').on('click', function() {
            validator.destroy();
            $('#FormCliente').validate({
                rules: {
                    senha: {
                        required: true
                    },
                    confSenha: {
                        required: true,
                        equalTo: "#senha"
                    },
                    email: {
                        required: true
                    }
                }
            });
            var code = $(this).data('code');
            var cliente = $(this).data('cliente');
            var apelido = $(this).data('apelido');
            var cpf = $(this).data('cpf');
            var rg = $(this).data('rg');
            var datanasc = $(this).data('datanasc');
            var logradouro = $(this).data('logradouro');
            var numero = $(this).data('numero');
            var complemento = $(this).data('complemento');
            var bairro = $(this).data('bairro');
            var cep = $(this).data('cep');
            var id_cidade = $(this).data('id_cidade');
            var cidade = $(this).data('cidade');
            var id_condicao = $(this).data('id_condicao');
            var condicao = $(this).data('condicao');
            var whatsapp = $(this).data('whatsapp');
            var telefone = $(this).data('telefone');
            var email = $(this).data('email');
            var senha = $(this).data('senha');
            var confsenha = $(this).data('confsenha');
            // var observacao = $(this).data('observacao');
            var DataCadastro = $(this).data('data_create');
            var DataAlteracao = $(this).data('data_alt');
            $("input").prop("readonly", false); //habilita os campos para digitar
            $("#cidade,#condicao,#id,#alterardata_create,#alterardata_alt").prop("readonly", true);
            $("#id").val(code); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#cliente").val(cliente); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#apelido").val(apelido); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#cpf").val(cpf); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#rg").val(rg); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#dataNasc").val(datanasc);
            $("#logradouro").val(logradouro);
            $("#numero").val(numero);
            $("#complemento").val(complemento);
            $("#bairro").val(bairro);
            $("#cep").val(cep);
            $("#id_cidade").val(id_cidade);
            $("#cidade").val(cidade);
            $("#id_condicao").val(id_condicao);
            $("#condicao").val(condicao);
            $("#whatsapp").val(whatsapp);
            $("#telefone").val(telefone);
            $("#email").val(email);
            $("#senha").val(senha);
            $("#confSenha").val(confsenha);
            // $("#observacao").val(observacao);
            $("#data_create").val(
                DataCadastro); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#data_alt").val(
                DataAlteracao); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#destroy").val('alterar');




            $(".modal-header").css("background-color", "#343a40");
            $(".modal-header").css("color", "white");
            $(".btn.btn-dark.btncliente").text("ALTERAR");
            $(".modal-titleCliente").text(" Editar Cliente ");
            $('#FormCliente').attr('method', 'Post');
            $('#FormCliente').attr('action', '/cliente/alterar');
            $('.modalcliente').modal('show'); // modal aparece
        });

        $('.excluir').on('click', function() {
            validator.destroy();
            var code = $(this).data('code');
            var cliente = $(this).data('cliente');
            var apelido = $(this).data('apelido');
            var cpf = $(this).data('cpf');
            var rg = $(this).data('rg');
            var datanasc = $(this).data('datanasc');
            var logradouro = $(this).data('logradouro');
            var numero = $(this).data('numero');
            var complemento = $(this).data('complemento');
            var bairro = $(this).data('bairro');
            var cep = $(this).data('cep');
            var id_cidade = $(this).data('id_cidade');
            var cidade = $(this).data('cidade');
            var id_condicao = $(this).data('id_condicao');
            var condicao = $(this).data('condicao');
            var whatsapp = $(this).data('whatsapp');
            var telefone = $(this).data('telefone');
            var email = $(this).data('email');
            var senha = $(this).data('senha');
            var confsenha = $(this).data('confsenha');
            // var observacao = $(this).data('observacao');
            var DataCadastro = $(this).data('data_create');
            var DataAlteracao = $(this).data('data_alt');

            $("#id").val(code); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#cliente").val(cliente); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#apelido").val(apelido); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#cpf").val(cpf); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#rg").val(rg); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#dataNasc").val(datanasc);
            $("#logradouro").val(logradouro);
            $("#numero").val(numero);
            $("#complemento").val(complemento);
            $("#bairro").val(bairro);
            $("#cep").val(cep);
            $("#id_cidade").val(id_cidade);
            $("#cidade").val(cidade);
            $("#id_condicao").val(id_condicao);
            $("#condicao").val(condicao);
            $("#whatsapp").val(whatsapp);
            $("#telefone").val(telefone);
            $("#email").val(email);
            $("#senha").val(senha);
            $("#confSenha").val(confsenha);
            // $("#observacao").val(observacao);
            $("#data_create").val(DataCadastro);
            $("#data_alt").val(DataAlteracao);


            $("input").prop("readonly", true); //habilita os campos para digitar
            $('input[type="search"]').prop("disabled", false);
            // $("#observacao").prop("readonly", true);
            $(".modal-header").css("background-color", "#343a40");
            $(".modal-header").css("color", "white");
            $(".btn.btn-dark.btncliente").text("EXCLUIR");
            $(".modal-titleCliente").text(" Excluir Cliente ");
            $('#FormCliente').attr('method', 'Post');
            $('#FormCliente').attr('action', '/cliente/alterar');
            $('.modalcliente').modal('show'); // modal aparece
            $("#destroy").val('excluir');



        });

        $(".btnaddcliente").click(function() {
            validator.destroy();
            $('#FormCliente').validate({
                rules: {
                    senha: {
                        required: true
                    },
                    confSenha: {
                        required: true,
                        equalTo: "#senha"
                    },
                    email: {
                        required: true
                    }
                }
            });
            $('#FormCliente').attr('method', 'post');
            $('#FormCliente').attr('action', '/cliente');
            $(".modal-titleCliente").text(" Cadastrar Cliente ");
            $(".btn.btn-dark.btncliente").text("SALVAR");
            $("input").prop("readonly", false);
            $("#cidade,#condicao,#id,#alterardata_create,#alterardata_alt").prop("readonly", true);
            $("#FormCliente").trigger("reset");
        });




        $('#FormCliente').submit(function(event) {
            event.preventDefault();
            $("#msgcpfin").remove();
            $("#msgcliente").remove();
            $("#msgcidade").remove();
            campos = $('#FormCliente').valid();

            if (campos === true) {
                $.ajax({
                    url: "{{ route('adicionarcliente.adicionarcliente') }}",
                    headers: 'Accept',
                    type: 'POST',
                    data: $('#FormCliente').serialize(),
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(data.message);
                        if (data.cpf === false) {
                            $("#msgcpfin").remove();
                            $('#clienteCpf').append(
                                '<p id="msgcpfin" class="text-danger">' + data.message +
                                '</p>');
                            document.getElementById("cpf").focus();

                        } else if (data.cliente === false) {
                            $("#msgcliente").remove();
                            $('#cliente_cliente').append(
                                '<p id="msgcliente" class="text-danger">' + data
                                .message + '</p>');
                            document.getElementById("cliente").focus();

                        } else if (data.cidade === false) {
                            console.log(data.message);
                            $("#msgcidade").remove();
                            $('#cliente_cidade').append(
                                '<p id="msgcidade" class="text-danger">' + data
                                .message + '</p>');
                            document.getElementById("id_cidade").focus();

                        } else {
                            
                            swal(data.message);
                            console.log(data.message);
                            $('.modalcliente').modal('hide');
                            setTimeout(function() {
                                window.location.reload(true);
                            }, 850);

                        }

                    },
                    error: function(data) {
                        console.log(data.message);

                    },
                });
            }

        });

        $("#telefone,#whatsapp").mask("(00) 00000-0000");
        $("#cep").mask("00000-000");
        $("#cpf").mask("000.000.000-00");

    });
</script>
