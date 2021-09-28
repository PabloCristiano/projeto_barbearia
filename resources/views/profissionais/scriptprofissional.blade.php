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
                validator.destroy();
                var cod = $(this).data('cod');
                var profissional = $(this).data('profissional');
                var apelido = $(this).data('apelido');
                var cpf = $(this).data('cpf');
                var rg = $(this).data('rg');
                var Nascimento = $(this).data('nasci');
                var logradouro = $(this).data('logradouro');
                var numero = $(this).data('numero');
                var complemento = $(this).data('complemento');
                var bairro = $(this).data('bairro');
                var cep = $(this).data('cep');
                var id_cidade = $(this).data('id_cidade');
                var nome_cidade = $(this).data('nome_cidade');
                var id_servico = $(this).data('id_servico');
                var nome_servico = $(this).data('nome_servico');
                var whatsapp = $(this).data('whatsapp');
                var telefone = $(this).data('telefone');
                var email = $(this).data('email');
                var senha = $(this).data('senha');
                var confSenha = $(this).data('confSenha');
                var tipo = $(this).data('tipo');
                var comissao = $(this).data('comissao');
                var DataCadastro = $(this).data('data_create');
                var DataAlteracao = $(this).data('data_alt');
                $("#FormProfissionais").trigger("reset");
                $("input").prop("disabled", false); //habilita os campos para digitar

                $("#id").val(cod);
                $("#profissional").val(profissional);
                $("#apelido").val(apelido);
                $("#logradouro").val(logradouro);
                $("#numero").val(numero);
                $("#complemento").val(complemento);
                $("#bairro").val(bairro);
                $("#cep").val(cep);
                $("#id_cidade").val(id_cidade);
                $("#cidade").val(nome_cidade);
                $("#whatsapp").val(whatsapp);
                $("#telefone").val(telefone);
                $("#email").val(email);
                $("#senha").val(senha);
                $("#confSenha").val(senha);
                $("#cpf").val(cpf);
                $("#rg").val(rg);
                $("#dataNasc").val(Nascimento);
                $("#id_servico").val(id_servico);
                $("#servico").val(nome_servico);
                $("#comissao").val(comissao);
                $("#alterardata_create").val(DataCadastro);
                $("#alterardata_alt").val(DataAlteracao);

                $(".modal-header").css("background-color", "#343a40");
                $(".modal-header").css("color", "white");
                $(".btn.btn-dark.btnprofissional").text("ALTERAR");
                $(".modal-titleprofissional").text(" Editar Profissional ");
                $('#FormProfissionais').attr('method', 'POST');
                $('#FormProfissionais').attr('action', '/profissional/alterar');
                $('.modalprofissional').modal('show'); // modal aparece

                $(".btnprofissional").click(function() {
                    $("#FormProfissionais").validate({
                        rules: {
                            senha: {
                                required: true
                            },
                            confSenha: {
                                required: true,
                                equalTo: "#senha"
                            }
                        }

                    });

                });


            });

            $('.excluir').on('click', function() {
                var cod = $(this).data('cod');
                var profissional = $(this).data('profissional');
                var apelido = $(this).data('apelido');
                var cpf = $(this).data('cpf');
                var rg = $(this).data('rg');
                var Nascimento = $(this).data('nasci');
                var logradouro = $(this).data('logradouro');
                var numero = $(this).data('numero');
                var complemento = $(this).data('complemento');
                var bairro = $(this).data('bairro');
                var cep = $(this).data('cep');
                var id_cidade = $(this).data('id_cidade');
                var nome_cidade = $(this).data('nome_cidade');
                var id_servico = $(this).data('id_servico');
                var nome_servico = $(this).data('nome_servico');
                var whatsapp = $(this).data('whatsapp');
                var telefone = $(this).data('telefone');
                var email = $(this).data('email');
                var senha = $(this).data('senha');
                var confSenha = $(this).data('confSenha');
                var tipo = $(this).data('tipo');
                var comissao = $(this).data('comissao');
                var DataCadastro = $(this).data('data_create');
                var DataAlteracao = $(this).data('data_alt');

                $("input").prop("disabled", true); //habilita os campos para digitar
                $('input[type="search"]').prop("disabled", false);

                $("#id").val(cod);
                $("#profissional").val(profissional);
                $("#apelido").val(apelido);
                $("#logradouro").val(logradouro);
                $("#numero").val(numero);
                $("#complemento").val(complemento);
                $("#bairro").val(bairro);
                $("#cep").val(cep);
                $("#id_cidade").val(id_cidade);
                $("#cidade").val(nome_cidade);
                $("#whatsapp").val(whatsapp);
                $("#telefone").val(telefone);
                $("#email").val(email);
                $("#senha").val(senha);
                $("#confSenha").val(senha);
                $("#cpf").val(cpf);
                $("#rg").val(rg);
                $("#dataNasc").val(Nascimento);
                $("#id_servico").val(id_servico);
                $("#servico").val(nome_servico);
                $("#comissao").val(comissao);
                $("#alterardata_create").val(DataCadastro);
                $("#alterardata_alt").val(DataAlteracao)

                $(".modal-header").css("background-color", "#343a40");
                $(".modal-header").css("color", "white");
                $(".btn.btn-dark.btnprofissional").text("EXCLUIR");
                $(".modal-titleprofissional").text(" Excluir Profissional ");
                $('#FormProfissionais').attr('method', 'get');
                $('#FormProfissionais').attr('action', '/profissional/excluir/' + cod);
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
                //  $("#dataNasc").attr('value', '');
            });





            //mascaras formulario profissinal

            $("#telefone,#whatsapp").mask("(00) 00000-0000");
            $("#cpf").mask("000.000.000-00");
            $("#rg").mask("00.000.000-0");
            $("#cep").mask("00000-000");

            //validar formulario   



        });

        $(".btnprofissional").on('click', function() {
            var teste = true;

            if (teste === true) {
                alert('TESTE')
            } else {

                $(this).attr("type", "submit");
            }

        });








    });
</script>
