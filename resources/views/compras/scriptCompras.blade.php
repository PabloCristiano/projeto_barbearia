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
           `<tr id="tablebProduto">
                <td class="text-center" id="tb_id_produto"  data-id="">
                    
                    
                </td>
                <td class="text-center produto" id="tb_produto">
                    
                    
                </td>
                <td class="text-center" id="tb_unidade">
                    
                    
                </td>
                <td class="text-center" id="tb_quantidade">
                    
                </td>
                <td class="text-center" id="tb_valorUni">
                    
                </td>
                <td class="text-center" id="tb_desconto">                   

                </td>
                <td class="text-center" id="tb_SubTotal">
                   
                </td>
                <td class="text-center col-2">
                    <div class="btn-group-sm">
                        <button type="button" class="btn btn-warning edit" title="Editar">
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

       

        $("#tbProduto").attr("id", `tbProduto${index}`);
        $(`#tb_id_produto_${index}`).text($("#id_produto").val());
        $(`#tb_produto_${index}`).text($("#produto").val());
        $(`#tb_unidade_${index}`).text("UNI");
        $(`#tb_quantidade_${index}`).text($("#quantidade").val());
        $(`#tb_valorUni_${index}`).text('R$'+$("#valor_uni").val());
        $(`#tb_desconto_${index}`).text($("#desconto").val()+ '%');
        let subTotal = CalcDesconto($("#quantidade").val(),$("#valor_uni").val(),$("#desconto").val());
        $(`#tb_SubTotal_${index}`).text('R$'+ subTotal.toFixed(2) );

        $("#id_produto").val('');
        $("#produto").val('');
        $("#quantidade").val('');
        $("#valor_uni").val('');
        $("#desconto").val('');
        $("#btnAddProduto").prop("disabled", true);
        qtd_totalProduto = qtd_totalProduto + subTotal;
        $("#totalCompra").val(qtd_totalProduto.toFixed(2));

    });

    
    $(document).on("click", ".edit", function(){
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        produto = fila.find('td:eq(1)').text();
        unidade = fila.find('td:eq(2)').text();
        quantidade = fila.find('td:eq(3)').text();
        valorUni = fila.find('td:eq(4)').text();
        desconto = fila.find('td:eq(5)').text();
        subTotal = fila.find('td:eq(6)').text();
        valorUni = valorUni.replace("R$","");
        desconto = desconto.replace("%","");
        subTotal = subTotal.replace("R$","");
        
        $("#codProdutoCompra").val(id);
        $("#produtoCompra").val(produto);
        $("#unidadeProduto").val(unidade);
        $("#quantidadeProduto").val(quantidade);
        $("#precoCustoProduto").val(valorUni);
        $("#descontoProduto").val(desconto);
        $("#subTotalProduto").val(subTotal);
        $('#exampleModalCenter').modal('show');

        $("#quantidadeProduto").keyup(function(){
            qtd = $("#quantidadeProduto").val();
            valorUni = $("#precoCustoProduto").val();
            desconto = $("#descontoProduto").val();
            subTotal = CalcDesconto(qtd,valorUni,desconto);
            subTotal = subTotal.toFixed(2);
            $("#subTotalProduto").val(subTotal);
        });
        $("#descontoProduto").keyup(function(){
            qtd = $("#quantidadeProduto").val();
            valorUni = $("#precoCustoProduto").val();
            desconto = $("#descontoProduto").val();
            subTotal = CalcDesconto(qtd,valorUni,desconto);
            subTotal = subTotal.toFixed(2);
            $("#subTotalProduto").val(subTotal);
        });
        $("#btnEditDetalheProduto").on('click',function(){
            quantidade = $("#quantidadeProduto").val()
            desconto =   $("#descontoProduto").val()
            fila.find('td:eq(3)').text(quantidade);
            fila.find('td:eq(5)').text(desconto +'%');
            subTotal = $("#subTotalProduto").val()
            fila.find('td:eq(6)').text(subTotal);
            $('#exampleModalCenter').modal('hide');
            itens = setItensProdutos();
            itens.forEach(function(data,i){
              soma = parseInt(data.subTotal);
              console.log(soma);
              qtd_totalProduto = ++soma;
               
              
            })
            console.log(qtd_totalProduto); 
           
        })
        
        //$("#totalCompra").val();

    });
    
    function CalcDesconto(qtd,valor, desc){
        let desconto = (desc/100)
        let conta = (qtd * valor) * desconto;
        let subTotal = (qtd * valor) - conta;
        return subTotal; 
    }
    
    function setItensProdutos(){
        const tr = document.querySelectorAll('#tablebProduto');
        const qtdparcela = tr.length;
        const arr = [];
        for (let j = 0; j < qtdparcela; j++){          
            var id_produto =    tr[j].querySelector(`#tb_id_produto_${j}`).textContent;                
            var tb_produto =    tr[j].querySelector(`#tb_produto_${j}`).textContent;
            var tb_unidade =    tr[j].querySelector(`#tb_unidade_${j}`).textContent;
            var tb_quantidade = tr[j].querySelector(`#tb_quantidade_${j}`).textContent;
            var tb_valorUni =   tr[j].querySelector(`#tb_valorUni_${j}`).textContent;
            var tb_desconto =   tr[j].querySelector(`#tb_desconto_${j}`).textContent;
            var subTotal =      tr[j].querySelector(`#tb_SubTotal_${j}`).textContent; 
            var id = j;
            arr.push({
                id,
                id_produto,
                tb_produto,
                tb_unidade,
                tb_quantidade,
                tb_valorUni,
                tb_desconto,
                subTotal,
            });
        }
        return arr;
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
