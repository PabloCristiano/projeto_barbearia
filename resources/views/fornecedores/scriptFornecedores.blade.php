<script>
    $(document).ready(function() {
        $(".custom-control-input").click(function() {
            let id = $(this).attr("id");
    
            if (id === "fisica") {
                $("#nomefantasia").prev().text("Apelido");
    
                $("#cpf_cnpj").prev().text("CPF *");
                $("#cpf_cnpj").addClass("cpf");
                $("#cpf_cnpj").removeClass("cnpj");
    
                $("#cpf_cnpj").attr("placeholder", "___.___.___-__");
                $("#cpf_cnpj").attr("name", "cpf");
                $("#rg_inscricao_estadual").attr("name", "rg");
                $("#rg_inscricao_estadual").prev().text("RG");    
                $("#rg_inscricao_estadual").val('');
                $("#cpf_cnpj").val('');
                $('input[name="cpf"]').mask("000.000.000-00");
                $('input[name="rg"]').mask("0000.000-0");

            } else if (id === "juridica") {
                $("#nomefantasia").prev().text("Nome Fantasia");    
                $("#cpf_cnpj").prev().text("CNPJ *");
                $("#cpf_cnpj").addClass("cnpj");
                $("#cpf_cnpj").removeClass("cpf");    
                $("#cpf_cnpj").attr("placeholder", "__.___.___/____-__");
                $("#cpf_cnpj").attr("name", "cnpj");
                $("#rg_inscricao_estadual").attr("name", "ie");               
                $("#rg_inscricao_estadual").prev().text("Inscrição Estadual");    
                $("#cpf_cnpj, #rg_inscricao_estadual").val('');
                $("#rg_inscricao_estadual").val('');
                $("#cpf_cnpj").val('');
                $('input[name="cnpj"]').mask("00.000.000/0000-00");
                $('input[name="ie"]').mask("0000.000-00");
            }
           
        });

        $('#tableFornecedor').DataTable({
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
            var validator = $("#FormFornecedor").validate({});


            $('.alterar').on('click', function(){
                validator.destroy();
                $('#FormFornecedor').validate();
                var id = $(this).data('cod');
                var tipo = $(this).data('tipo_pessoa');
                var rsaocial = $(this).data("rsaocial");
                var nomeFantasia = $(this).data('nomefantasia');
                var apelido = $(this).data('apelido');
                var logradouro = $(this).data('logradouro');
                var numero = $(this).data('numero');
                var complemento = $(this).data('complemento');
                var bairro = $(this).data('bairro');
                var cep = $(this).data('cep');
                var id_cidade = $(this).data('id_cidade');
                var cidade = $(this).data('cidade');
                var whatsapp = $(this).data('whatsapp');
                var telefone = $(this).data('telefone');
                var email = $(this).data('email');
                var pagSite = $(this).data('pagsite');
                var contato = $(this).data('contato');
                var cnpj = $(this).data('cnpj');
                var ie = $(this).data('ie');
                var cpf = $(this).data('cpf');
                var rg = $(this).data('rg');
                var id_condicaopg = $(this).data('id_condicaopg');
                var condicaopg = $(this).data('condicaopg');
                var limitecredito = $(this).data('limitecredito');
                var obs = $(this).data('obs');
                
                $("input").prop("disabled", false);
                $("#id").val(id);
                $("#razaoSocial").val(rsaocial);
                $("#nomefantasia").val(nomeFantasia);
                $("#logradouro").val(logradouro);
                $("#numero").val(numero);
                $("#complemento").val(complemento);
                $("#bairro").val(bairro);
                $("#cep").val(cep);
                $("#id_cidade").val(id_cidade);
                $("#cidade").val(cidade);
                $("#whatsapp").val(whatsapp);
                $("#telefone").val(telefone);
                $("#email").val(email);
                $("#pagSite").val(pagSite);
                $("#contato").val(contato);
                $("#id_condicaopg").val(id_condicaopg);
                $("#condicaopg").val(condicaopg);
                $("#limiteCredito").val(limitecredito);
                $("#obs").val(obs);
                
                if ( tipo === "FISICA") {
                    $("#juridica").prop("disabled", true);
                    $("#nomefantasia").prev().text("Apelido");    
                    $("#cpf_cnpj").prev().text("CPF *");
                    $("#cpf_cnpj").addClass("cpf");
                    $("#cpf_cnpj").removeClass("cnpj");    
                    $("#cpf_cnpj").attr("placeholder", "___.___.___-__");
                    $("#cpf_cnpj").attr("name", "cpf");
                    $("#rg_inscricao_estadual").attr("name", "rg");
                    $("#rg_inscricao_estadual").prev().text("RG");    
                    $("#cpf_cnpj").val(cpf);
                    $("#rg_inscricao_estadual").val(rg);
                    $('input[value="fisica"]').prop("checked", true);                

                } else if ( tipo === "JURIDICA") {
                    $("#fisica").prop("disabled", true);
                    $("#nomefantasia").prev().text("Nome Fantasia");    
                    $("#cpf_cnpj").prev().text("CNPJ *");
                    $("#cpf_cnpj").addClass("cnpj");
                    $("#cpf_cnpj").removeClass("cpf");    
                    $("#cpf_cnpj").attr("placeholder", "__.___.___/____-__");
                    $("#cpf_cnpj").attr("name","cnpj");
                    $("#rg_inscricao_estadual").attr("name", "ie");               
                    $("#rg_inscricao_estadual").prev().text("Inscrição Estadual");    
                    $("#cpf_cnpj").val(cnpj);
                    $("#rg_inscricao_estadual").val(ie);
                    $('input[value="juridica"]').prop("checked", true);                 

                }              
               

                $(".modal-header").css("background-color", "#343a40");
                $(".modal-header").css("color", "white" );
                $(".btn.btn-dark.btnfornecedor").text("ALTERAR");
                $(".modal-titlefornecedor").text(" Editar Fornecedor ");
                $('#FormFornecedor').attr('method', 'POST');
                $('#FormFornecedor').attr('action', '/fornecedor/alterar');
                $('.modalfornecedor').modal('show'); // modal aparece

                


            });


            $('.excluir').on('click', function(){
                validator.destroy();
                var cod = $(this).data('cod');
                var tipo = $(this).data('tipo_pessoa');
                var rsaocial = $(this).data("rsaocial");
                var nomeFantasia = $(this).data('nomefantasia');
                var apelido = $(this).data('apelido');
                var logradouro = $(this).data('logradouro');
                var numero = $(this).data('numero');
                var complemento = $(this).data('complemento');
                var bairro = $(this).data('bairro');
                var cep = $(this).data('cep');
                var id_cidade = $(this).data('id_cidade');
                var cidade = $(this).data('cidade');
                var whatsapp = $(this).data('whatsapp');
                var telefone = $(this).data('telefone');
                var email = $(this).data('email');
                var pagSite = $(this).data('pagsite');
                var contato = $(this).data('contato');
                var cnpj = $(this).data('cnpj');
                var ie = $(this).data('ie');
                var cpf = $(this).data('cpf');
                var rg = $(this).data('rg');
                var id_condicaopg = $(this).data('id_condicaopg');
                var condicaopg = $(this).data('condicaopg');
                var limitecredito = $(this).data('limitecredito');
                var obs = $(this).data('obs');               
            

                
                $("#id").val(cod);
                $("#razaoSocial").val(rsaocial);
                $("#nomefantasia").val(nomeFantasia);
                $("#logradouro").val(logradouro);
                $("#numero").val(numero);
                $("#complemento").val(complemento);
                $("#bairro").val(bairro);
                $("#cep").val(cep);
                $("#id_cidade").val(id_cidade);
                $("#cidade").val(cidade);
                $("#whatsapp").val(whatsapp);
                $("#telefone").val(telefone);
                $("#email").val(email);
                $("#pagSite").val(pagSite);
                $("#contato").val(contato);
                $("#id_condicaopg").val(id_condicaopg);
                $("#condicaopg").val(condicaopg);
                $("#limiteCredito").val(limitecredito);
                $("#obs").val(obs);
                
                if ( tipo === "fisica") {
                    $("#nome_fantasia").prev().text("Apelido");    
                    $("#cpf_cnpj").prev().text("CPF *");
                    $("#cpf_cnpj").addClass("cpf");
                    $("#cpf_cnpj").removeClass("cnpj");    
                    $("#cpf_cnpj").attr("placeholder", "___.___.___-__");
                    $("#cpf_cnpj").attr("name", "cpf");
                    $("#rg_inscricao_estadual").attr("name", "rg");
                    $("#rg_inscricao_estadual").prev().text("RG");    
                    $("#cpf_cnpj").val(cpf);
                    $("#rg_inscricao_estadual").val(rg);
                    $('input[value="fisica"]').prop("checked", true);                

                } else if ( tipo === "juridica") {
                    $("#nome_fantasia").prev().text("Nome Fantasia");    
                    $("#cpf_cnpj").prev().text("CNPJ *");
                    $("#cpf_cnpj").addClass("cnpj");
                    $("#cpf_cnpj").removeClass("cpf");    
                    $("#cpf_cnpj").attr("placeholder", "__.___.___/____-__");
                    $("#cpf_cnpj").attr("name","cnpj");
                    $("#rg_inscricao_estadual").attr("name", "ie");               
                    $("#rg_inscricao_estadual").prev().text("Inscrição Estadual");    
                    $("#cpf_cnpj").val(cnpj);
                    $("#rg_inscricao_estadual").val(ie);
                    $('input[value="juridica"]').prop("checked", true);                 

                } 
               

                $("input").prop("disabled", true);//habilita os campos para digitar
                $('input[type="search"]').prop("disabled", false);

                
                
                $(".modal-header").css("background-color", "#343a40");
                $(".modal-header").css("color", "white" );
                $(".btn.btn-dark.btnfornecedor").text("EXCLUIR");
                $(".modal-titlefornecedor").text(" Excluir Fornecedor ");
                $('#FormFornecedor').attr('method', 'get');
                $('#FormFornecedor').attr('action', '/fornecedor/excluir/'+cod);
                $('.modalfornecedor').modal('show'); // modal aparece

                
            });

    


            $(".btn-addfornecedor").click(function(){
                validator.destroy();
                $('#FormFornecedor').validate();              
                $('#FormFornecedor').attr('method', 'POST');
                $('#FormFornecedor').attr('action', '/fornecedor');
                $(".modal-titlefornecedor").text(" Cadastrar Fornecedor ");
                $(".btn.btn-dark.btnfornecedor").text("SALVAR");
                $("input").prop("disabled", false);
                $("#FormFornecedor").trigger("reset");    
                
            });

           
});
</script>