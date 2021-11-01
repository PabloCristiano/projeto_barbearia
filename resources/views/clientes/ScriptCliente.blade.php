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

        function validarCpf(cpf) {
            if (typeof cpf !== "string") return false
            cpf = cpf.replace(/[\s.-]*/igm, '')
            if (
                !cpf ||
                cpf.length != 11 ||
                cpf == "00000000000" ||
                cpf == "11111111111" ||
                cpf == "22222222222" ||
                cpf == "33333333333" ||
                cpf == "44444444444" ||
                cpf == "55555555555" ||
                cpf == "66666666666" ||
                cpf == "77777777777" ||
                cpf == "88888888888" ||
                cpf == "99999999999"
            ) {
                return false
            }
            var soma = 0
            var resto
            for (var i = 1; i <= 9; i++)
                soma = soma + parseInt(cpf.substring(i - 1, i)) * (11 - i)
            resto = (soma * 10) % 11
            if ((resto == 10) || (resto == 11)) resto = 0
            if (resto != parseInt(cpf.substring(9, 10))) return false
            soma = 0
            for (var i = 1; i <= 10; i++)
                soma = soma + parseInt(cpf.substring(i - 1, i)) * (12 - i)
            resto = (soma * 10) % 11
            if ((resto == 10) || (resto == 11)) resto = 0
            if (resto != parseInt(cpf.substring(10, 11))) return false
            return true

        }

        var validator = $("#FormCliente").validate();
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

        $('.alterar').on('click', function() {
            let id = $(this).data('code');
            console.log('cliente');
            $.ajax({
                url: "{{ route('findByIdCliente') }}",
                type: 'POST',
                dataType: "json",
                data: {
                    _token: '{!! csrf_token() !!}',
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    $("#cidade,#condicao,#id,#data_create,#data_alt").prop(
                        "readonly", true);
                    $("#id").val(data[0].id);
                    $("#cliente").val(data[0].cliente);
                    $("#apelido").val(data[0].apelido);
                    $("#cpf").val(data[0].cpf);
                    $("#rg").val(data[0].rg);
                    $("#dataNasc").val(data[0].dataNasc);
                    $("#logradouro").val(data[0].logradouro);
                    $("#numero").val(data[0].numero);
                    $("#complemento").val(data[0].complemento);
                    $("#bairro").val(data[0].bairro);
                    $("#cep").val(data[0].cep);
                    $("#id_cidade").val(data[0].id_cidade);
                    $("#cidade").val(data[0].cidade);
                    $("#id_condicao").val(data[0].id_condicao);
                    $("#condicao").val(data[0].condicao_pagamento);
                    $("#whatsapp").val(data[0].whatsapp);
                    $("#telefone").val(data[0].telefone);
                    $("#email").val(data[0].email);
                    $("#senha").val(data[0].senha);
                    $("#confSenha").val(data[0].confSenha);
                    $("#data_create").val(data[0].data_create);
                    $("#data_alt").val(data[0].data_alt);
                },
                error: function() {
                    return false;
                }
            });
            $("input").prop("readonly", false);
            $("#cidade,#condicao,#id,#data_create,#data_alt").prop("readonly", true);
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
            let id = $(this).data('code');
            console.log('cliente');
            $.ajax({
                url: "{{ route('findByIdCliente') }}",
                type: 'POST',
                dataType: "json",
                data: {
                    _token: '{!! csrf_token() !!}',
                    id: id
                },
                success: function(data) {
                    $("#cidade,#condicao,#id,#data_create,#data_alt").prop(
                        "readonly", true);
                    $("#id").val(data[0].id);
                    $("#cliente").val(data[0].cliente);
                    $("#apelido").val(data[0].apelido);
                    $("#cpf").val(data[0].cpf);
                    $("#rg").val(data[0].rg);
                    $("#dataNasc").val(data[0].dataNasc);
                    $("#logradouro").val(data[0].logradouro);
                    $("#numero").val(data[0].numero);
                    $("#complemento").val(data[0].complemento);
                    $("#bairro").val(data[0].bairro);
                    $("#cep").val(data[0].cep);
                    $("#id_cidade").val(data[0].id_cidade);
                    $("#cidade").val(data[0].cidade);
                    $("#id_condicao").val(data[0].id_condicao);
                    $("#condicao").val(data[0].condicao_pagamento);
                    $("#whatsapp").val(data[0].whatsapp);
                    $("#telefone").val(data[0].telefone);
                    $("#email").val(data[0].email);
                    $("#senha").val(data[0].senha);
                    $("#confSenha").val(data[0].confSenha);
                    $("#data_create").val(data[0].data_create);
                    $("#data_alt").val(data[0].data_alt);
                },
                error: function() {
                    return false;
                }
            });
            $("input").prop("readonly", true);
            $('input[type="search"]').prop("disabled", false);
            $(".modal-header").css("background-color", "#343a40");
            $(".modal-header").css("color", "white");
            $(".btn.btn-dark.btncliente").text("EXCLUIR");
            $(".modal-titleCliente").text(" Excluir Cliente ");
            $('#FormCliente').attr('method', 'get');
            $('#FormCliente').attr('action', '/cliente/excluir/' + id);
            $('.modalcliente').modal('show');
            $("#destroy").val(true);



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



        $("#telefone,#whatsapp").mask("(00) 00000-0000");
        $("#cep").mask("00000-000");
        $("#cpf").mask("000.000.000-00");

        $('.btncliente').on('click', function(){
            $('#msgCliente').text('');
            console.log($("#destroy").val());
            let campos = $("#FormCliente").valid();
            if ($('#id').val() > 0 && campos === true) {
                let cpf = validarCpf($('#cpf').val());
                if (cpf === false) {
                    $('#cpf').focus();
                    $('#clienteCpf').append($('#msgCliente').text('Favor informar um CPF válido!'));
                    $('#cpf').keyup(function() {
                        $('#msgCliente').text('');
                    });
                    return false;
                } else {
                    
                }
                $(this).attr("type", "submit");
                return true;
            } else {
                if (campos === true) {
                    let cpf = validarCpf($('#cpf').val());
                    if (cpf === false) {
                        $("#cpf").focus();
                        $('#clienteCpf').append($('#msgCliente').text('Favor informar um CPF válido!'));
                        $('#cpf').keyup(function() {
                            $('#msgCliente').text('');
                        });
                        return false;   
                    }else{
                        $("#msgCpf").text('');
                    }

                    $.ajax({
                        url: "{{ route('findByIdCpf') }}",
                        headers: 'Accept',
                        type: 'POST',
                        data: $('#FormCliente').serialize(),
                        dataType: 'JSON',
                        success: function(data) {
                            if (data.data[0].result > 0) {
                                $("#cliente").focus();
                                $("#msgCliente").text('Cliente já Cadastrado !');
                                $("#msgCpf").text('Cpf já Cadastrado !');
                                $("#cpf").keyup(function() {
                                    $("#msgCliente").text('');
                                    $("#msgCpf").text('');
                                });
                                $("#cliente").keyup(function() {
                                    $("#msgCliente").text('');
                                    $("#msgCpf").text('');
                                });
                                return false;
                            }
                            $('#FormCliente').attr('method', 'POST');
                            $('#FormCliente').attr('action', '/cliente');
                            $("#FormCliente").submit();
                        },
                        error: function(data) {

                        },
                    });
                    return true;
                }
            }
        });

        $("#id_cidade").autocomplete({
            source: function(resquest, response) {
                $.ajax({
                    url: "{{ route('searchCidade') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        _token: '{!! csrf_token() !!}',
                        search: resquest.term
                    },
                    success: function(data) {
                        $('#id_cidade').val(data[0].id);
                        $('#cidade').val(data[0].cidade);
                    },
                    error: function(data) {
                        return false;
                    }
                });
            },
        });

        {{--  $("#id_condicao").autocomplete({
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
        });  --}}

        {{--  $(document).on("click", "#showCondicaoPagamento tbody tr", function() {
            fila = $(this).closest("tr");
            id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
            condicao = fila.find('td:eq(1)').text();
            $("#id_condicao").val(id);
            $("#condicao").val(condicao);
            $('.modalShowCondicao').modal('toggle');
        });  --}}

    });
</script>
