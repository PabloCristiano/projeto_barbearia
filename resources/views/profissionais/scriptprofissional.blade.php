<script type="text/javascript">
    $(function() {
        $(document).ready(function() {
            $('#tableprofissional').DataTable({
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
            var validator = $("#FormProfissionais").validate({
                rules: {
                    profissional: {
                        maxlength: 50,
                        minlength: 3
                    },
                    senha: {
                        required: true
                    },
                    confSenha: {
                        required: true,
                        equalTo: "#senha"
                    },
                    tipoProf: {
                        required: true
                    },
                    whatsapp: {
                        minlength: 14
                    }
                }

            });

            $('.alterar').on('click', function() {
                let id = $(this).data('cod');
                $.ajax({
                    url: "{{ route('findByIdProfissional') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        _token: '{!! csrf_token() !!}',
                        id: id
                    },
                    success: function(data) {
                        $('#id').val(data.data[0].id);
                        $('#profissional').val(data.data[0].profissional);
                        $("#apelido").val(data.data[0].apelido);
                        $("#logradouro").val(data.data[0].logradouro);
                        $("#numero").val(data.data[0].numero);
                        $("#complemento").val(data.data[0].complemento);
                        $("#bairro").val(data.data[0].bairro);
                        $("#cep").val(data.data[0].cep);
                        $("#id_cidade").val(data.data[0].id_cidade);
                        $("#cidade").val(data.data[0].cidade);
                        $("#whatsapp").val(data.data[0].whatsapp);
                        $("#telefone").val(data.data[0].telefone);
                        $("#email").val(data.data[0].email);
                        $("#senha").val(data.data[0].senha);
                        $("#confSenha").val(data.data[0].senha);
                        $("#cpf").val(data.data[0].cpf);
                        $("#rg").val(data.data[0].rg);
                        $("#dataNasc").val(data.data[0].dataNasc);
                        $("#id_servico").val(data.data[0].id_servico);
                        $("#servico").val(data.data[0].servico);
                        $("#comissao").val(data.data[0].comissao);
                        $("#alterardata_create").val(data.data[0].data_create);
                        $("#alterardata_alt").val(data.data[0].data_alt);
                    },
                    error: function() {
                        return false;
                    }
                });
                $("#FormProfissionais").trigger("reset");
                $("input").prop("disabled", false);
                $(".modal-header").css("background-color", "#343a40");
                $(".modal-header").css("color", "white");
                $(".btn.btn-dark.btnprofissional").text("ALTERAR");
                $(".modal-titleprofissional").text(" Editar Profissional ");
                $('#FormProfissionais').attr('method', 'POST');
                $('#FormProfissionais').attr('action', '/profissional/alterar');
                $('.modalprofissional').modal('show'); // modal aparece
            });

            $('.excluir').on('click', function() {
                let id = $(this).data('cod');
                $.ajax({
                    url: "{{ route('findByIdProfissional') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        _token: '{!! csrf_token() !!}',
                        id: id
                    },
                    success: function(data) {
                        $('#id').val(data.data[0].id);
                        $('#profissional').val(data.data[0].profissional);
                        $("#apelido").val(data.data[0].apelido);
                        $("#logradouro").val(data.data[0].logradouro);
                        $("#numero").val(data.data[0].numero);
                        $("#complemento").val(data.data[0].complemento);
                        $("#bairro").val(data.data[0].bairro);
                        $("#cep").val(data.data[0].cep);
                        $("#id_cidade").val(data.data[0].id_cidade);
                        $("#cidade").val(data.data[0].cidade);
                        $("#whatsapp").val(data.data[0].whatsapp);
                        $("#telefone").val(data.data[0].telefone);
                        $("#email").val(data.data[0].email);
                        $("#senha").val(data.data[0].senha);
                        $("#confSenha").val(data.data[0].senha);
                        $("#cpf").val(data.data[0].cpf);
                        $("#rg").val(data.data[0].rg);
                        $("#dataNasc").val(data.data[0].dataNasc);
                        $("#id_servico").val(data.data[0].id_servico);
                        $("#servico").val(data.data[0].servico);
                        $("#comissao").val(data.data[0].comissao);
                        $("#alterardata_create").val(data.data[0].data_create);
                        $("#alterardata_alt").val(data.data[0].data_alt);
                    },
                    error: function() {
                        return false;
                    }
                });
                $("input").prop("disabled", true); //habilita os campos para digitar
                $('input[type="search"]').prop("disabled", false);
                $(".modal-header").css("background-color", "#343a40");
                $(".modal-header").css("color", "white");
                $(".btn.btn-dark.btnprofissional").text("EXCLUIR");
                $(".modal-titleprofissional").text(" Excluir Profissional ");
                $('#FormProfissionais').attr('method', 'get');
                $('#FormProfissionais').attr('action', '/profissional/excluir/' + id);
                $('.modalprofissional').modal('show'); // modal aparece


            });
            $(".btn-addprofissonal").click(function() {
                $("#FormProfissionais").validate();
                $('#FormProfissionais').attr('method', 'POST');
                $('#FormProfissionais').attr('action', '/profissional');
                $(".modal-titleprofissional").text(" Cadastrar Profissional ");
                $(".btn.btn-dark.btnprofissional").text("SALVAR");
                $("input").prop("disabled", false);
                $("#FormProfissionais").trigger("reset");
                $("#msgCpf").text("");
                //  $("#dataNasc").attr('value', '');
            });

            //mascaras formulario profissinal

            $("#telefone,#whatsapp").mask("(00) 00000-0000");
            $("#cpf").mask("000.000.000-00");
            $("#rg").mask("00.000.000-0");
            $("#cep").mask("00000-000");

        });

        $(".btnprofissional").on('click', function(event) {
            $("#msgProfissional").text("");
            $("#msgCpf").text("");
            const vm = this;
            $("#FormProfissionais").valid();
            let campos = $("#FormProfissionais").valid();
            $("#cpf").keyup(function() {
                $("#msgCpf").text("");
            })

            let cpf = validarCpf($("#cpf").val());
            if ($("#id").val() > 0 && campos === true) {
                let cpf = validarCpf($("#cpf").val());
                if (cpf === false) {
                    $("#cpf").focus();
                    $("#msgCpf").text("Favor informar um Cpf valido !");
                    return false;
                } else {
                    $("#msgCpf").text("");
                }
                $(this).attr("type", "submit");
                return true;
            }

            if (campos === true) {
                let cpf = validarCpf($("#cpf").val());
                if (cpf === false) {
                    $("#cpf").focus();
                    $("#msgCpf").text("Favor informar um Cpf valido !");
                    return false;
                } else {
                    $("#msgCpf").text("");
                }
                $.ajax({
                    url: "{{ route('findByIdCpf') }}",
                    headers: 'Accept',
                    type: 'POST',
                    data: $('#FormProfissionais').serialize(),
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(data.data[0].result);
                        event.preventDefault();
                        if (data.data[0].result > 0) {
                            console.log('condicao verdadeira');
                            swal("Profissional Já Cadastrado !");
                            $("#profissional").focus();
                            $("#msgCpf").text("Cpf Já Cadastrado !");
                            $("#msgProfissional").text("Profissional já Cadastrado !");
                            $("#cpf").keyup(function(){
                                $("#msgCpf").text("");
                            });
                            $("#profissional").keyup(function(){
                                $("#msgProfissional").text("");
                            });
                        }else{
                            $('.btnprofissional').attr("type", "submit");
                            return true;
                        }
                       
                    },
                    error: function(data) {

                    },
                });

                console.log('entrou na codição01');

            }

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

        $("#id_servico").autocomplete({
            source: function(resquest, response) {
                $.ajax({
                    url: "{{ route('searchServico') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        _token: '{!! csrf_token() !!}',
                        search: resquest.term
                    },
                    success: function(data) {
                        $('#id_servico').val(data[0].id);
                        $('#servico').val(data[0].servico);
                    },
                    error: function() {
                        return false;
                    }
                });
            },
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





    });
</script>
