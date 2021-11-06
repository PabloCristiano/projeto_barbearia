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

    let dayIn = moment().format('YYYY-MM-DD');
    $("#data_emissao").val(dayIn);
    $("#data_chegada").val(dayIn);

     //bloquear botão pesquisa produto
    $("#id_fornecedor").blur(function(){
        if($("#num_nota").val() > 0 & $("#id_fornecedor").val() > 0 ){
          $("#btnSearchProduto").prop("disabled", false);  
        }else{
            $("#btnSearchProduto").prop("disabled", true); 
        }
    });
     //bloquear botão pesquisa produto
    $("#num_nota").blur(function(){
        if($("#num_nota").val() > 0 & $("#id_fornecedor").val() > 0 ){
          $("#btnSearchProduto").prop("disabled", false);  
        }else{
            $("#btnSearchProduto").prop("disabled", true); 
        }
    });
    //limpa campo input Fornecedor 
    $("#id_fornecedor").keyup(function(){
        $("#fornecedor").val('');
    });

    // bloqueia  botão adicionar produto
    $("#quantidade").blur(function(){
        if($("#quantidade").val() > 0 & $("#id_produto").val() > 0 ){
            $("#btnAddProduto").prop("disabled", false);  
          }else{
              $("#btnAddProduto").prop("disabled", true); 
          }

    })
    // bloqueia  botão adicionar produto
    $("#id_produto").blur(function(){
        if($("#quantidade").val() > 0 & $("#id_produto").val() > 0 ){
            $("#btnAddProduto").prop("disabled", false);  
          }else{
              $("#btnAddProduto").prop("disabled", true); 
          }

    })
    //limpa campo input produto 
    $("#id_produto").keyup(function(){
        $("#produto").val('');
    });

const row = 
           `<tr id="tbProduto">
                <td class="text-center" id="tb_id_produto">
                    <input
                        type="hidden"
                        class="form-control idProduto"
                        name="id_produto"
                        id="id_produto"                    
                    >
                    
                </td>
                <td class="text-center" id="tb_produto">
                    <input
                        type="hidden"
                        class="form-control produto"
                        name="id_produto"
                        id="id_produto"                    
                    >
                    
                </td>
                <td class="text-center" id="tb_unidade">
                    <input
                        type="hidden"
                        class="form-control unidade"
                        name="id_produto"
                        id="id_produto"                    
                    >
                    
                </td>
                <td class="text-center" id="tb_quantidade">
                    <input
                        type="hidden"
                        class="form-control quandidade"
                        name="id_produto"
                        id="id_produto"                    
                    >
                </td>
                <td class="text-center" id="tb_valorUni">
                    <input
                        type="hidden"
                        class="form-control valorUni"
                        name="id_produto"
                        id="id_produto"                    
                    >
            
                </td>
                <td class="text-center" id="tb_desconto">
                    <input
                        type="hidden"
                        class="form-control desconto"
                        name="id_produto"
                        id="id_produto"                    
                    >

                </td>
                <td class="text-center" id="tb_SubTotal">
                    <input
                    type="hidden"
                    class="form-control subTotal"
                    name="id_produto"
                    id="id_produto"                    
                >

                </td>
                <td class="text-center col-2">
                    <div class="btn-group-sm">
                        <button type="button" class="btn btn-warning edit" title="Editar" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="fa fa-edit text-white"></i>
                        </button>
                        <button type="button" class="btn btn-danger delete" title="Remover">
                            <i class="fa fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>`;
            var qtd_totalProduto = 0; 

    $("#btnAddProduto").on("click",function(){
        
        let newRow = $(row).clone();
        $("#tableProduto tbody").append(newRow);
        const prevRow = newRow.prev();
        window.index = prevRow.index() + 1;
        newRow.find("#tb_id_produto").attr("id", `tb_id_produto_${index}`);
        newRow.find("#tb_produto").attr("id", `tb_produto_${index}`);
        newRow.find("#tb_unidade").attr("id", `tb_unidade_${index}`);
        newRow.find("#tb_quantidade").attr("id", `tb_quantidade_${index}`);
        newRow.find("#tb_valorUni").attr("id", `tb_valorUni_${index}`);
        newRow.find("#tb_desconto").attr("id", `tb_desconto_${index}`);
        newRow.find("#tb_SubTotal").attr("id", `tb_SubTotal_${index}`);

        $(`#tb_id_produto_${index}`).text($("#id_produto").val());
        $(`#tb_produto_${index}`).text($("#produto").val());
        $(`#tb_unidade_${index}`).text("UNI");
        $(`#tb_quantidade_${index}`).text($("#quantidade").val());
        $(`#tb_valorUni_${index}`).text('R$'+$("#valor_uni").val());
        $(`#tb_desconto_${index}`).text($("#desconto").val()+ '%');
        let subTotal = CalcDesconto($("#quantidade").val(),$("#valor_uni").val(),$("#desconto").val());
        $(`#tb_SubTotal_${index}`).text('R$'+ subTotal.toFixed(2) );
        console.log(subTotal);
        $("#id_produto").val('');
        $("#produto").val('');
        $("#quantidade").val('');
        $("#valor_uni").val('');
        $("#desconto").val('0');
        $("#btnAddProduto").prop("disabled", true);
        qtd_totalProduto = qtd_totalProduto + subTotal;
        $("#totalCompra").val(qtd_totalProduto.toFixed(2));

    });

    
    $(document).on("click", "#tableProduto tbody tr td", function() {
        {{-- fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        formapg = fila.find('td:eq(1)').text(); --}}
        {{-- $(`#id_forma_pagamento_${index}`).val(id);
        $(`#forma_pagamento_${index}`).val(formapg);
        $('.modalShowFormapg').modal('toggle'); --}}

        //alert($(this).text());
        {{-- var conteudoOriginal = $(this).text();
        var novoElemento = $('<input/>',{type:'text',value:conteudoOriginal});
        $(this).html(novoElemento.blur(function(){
            var conteudoNovo = $(this).val();
            $(this).parent().html(conteudoNovo);
        })); --}}

    });
    
    function CalcDesconto(qtd,valor, desc){
        let desconto = (desc/100)
        let conta = (qtd * valor) * desconto;
        let subTotal = (qtd * valor) - conta;
        return subTotal; 
    }


   const rowTablecondicao =
    `<tr id='tbCondicao'>
        <td class="text-center" id="tb_condicao_parcela">
            <input
                type="hidden"
                class="form-control idProduto"
                name="id_produto"
                id="id_produto"                    
            >
            
        </td>
        <td class="text-center" id="tb_condicao_formapg">
            <input
                type="hidden"
                class="form-control produto"
                name="id_produto"
                id="id_produto"                    
            >
            
        </td>
        <td class="text-center" id="tb_condicao_vencimento">
            <input
                type="hidden"
                class="form-control unidade"
                name="id_produto"
                id="id_produto"                    
            >
            
        </td>
        <td class="text-center" id="tb_condicao_ValorParcela">
            <input
                type="hidden"
                class="form-control quandidade"
                name="id_produto"
                id="id_produto"                    
            >
        </td>
    </tr>`
    $("#id_condicao").blur(function(){
        let id = $("#id_condicao").val();
        $.ajax({
            url: "{{ route('CondicaoPagamentoProduto') }}",
            type: 'POST',
            dataType: "json",
            data: {
                _token: '{!! csrf_token() !!}',
                id: id
            },
            success: function(data) {
                console.log(data);
                data.forEach(function(data,i){
                    let parcela = data.parcela;
                    let prazo   = data.prazo;
                    let porcentagem = data.porcentagem;
                    let forma_pg = data.forma_pg;
                    let newRowTablecondicap = $(rowTablecondicao).clone();
                    $("#tableCondicao tbody").append(newRowTablecondicap);
                    newRowTablecondicap.find("#tb_condicao_parcela").attr("id", `tb_condicao_parcela${i}`);
                    newRowTablecondicap.find("#tb_condicao_formapg").attr("id", `tb_condicao_formapg${i}`);
                    newRowTablecondicap.find("#tb_condicao_vencimento").attr("id", `tb_condicao_vencimento${i}`);
                    newRowTablecondicap.find("#tb_condicao_ValorParcela").attr("id", `tb_condicao_ValorParcela${i}`);
                    porcentagem = porcentagem/100;
                    valorParcela = qtd_totalProduto*porcentagem;
                    $(`#tb_condicao_parcela${i}`).text(parcela);
                    $(`#tb_condicao_formapg${i}`).text(forma_pg);
                    var day = new Date();
                    var vencimento = new Date();
                    vencimento.setDate(day.getDate() + prazo);
                    $(`#tb_condicao_vencimento${i}`).text(vencimento.toLocaleDateString());
                    $(`#tb_condicao_ValorParcela${i}`).text('R$'+ valorParcela.toFixed(2));                    
                });
                
            },
            error: function(data) {
                return false;
            }
        });
    });

    
    

});
</script>
