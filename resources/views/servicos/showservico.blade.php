<div class="modal fade  modalbuscaservico"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fa fa-list"></i>
                    <h3 class="ml-3 mb-0"> Serviços </h3>
                </div>
    
                <div class="float-right">
                   <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".modalservico"><i class="fa fa-plus"></i> Adicionar</button>
                </div>
            </div>
         </div>
         <div class="table-responsive">
            <div class="card-body"> 
                <table id="tablebuscaServico" class="table table-hover table-striped shadow-xs rounded" style="width:100%">
                <thead>
                    <tr>
                        <th >Código</th>
                        <th >Serviço</th>
                        <th >Valor</th>
                        <th >Tempo</th>
                    </tr>
                </thead>
                <tbody>
                
                @if (@isset($servicos))
                    @foreach ($servicos as $servico)    
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th></th>
                        
                    </tr>
                    @endforeach 
                @endif    
                </tbody>
        
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            </div> 
            <div class="modal-footer">
              <button class="btn btn-sm btn-dark" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
        </div>  
    </div>
  </div>
<script type="text/javascript">
    //função para popular datatable
    $(document).ready(function() {
        tablebuscaServico = $('#tablebuscaServico').DataTable({
            "language": {
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                        "sInfoThousands": ".",
                        "sLengthMenu": "_MENU_ resultados por página",
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
                    },
                      
                    "ajax":{            
                        "url": "{{ route('showservicos.showservicos') }}", 
                        "method": 'get', //usamos el metodo POST
                        "dataSrc":""
                    },
                    "columns":[
                        {"data": "id"},
                        {"data": "servico"},
                        {"data": "valor"},
                        {"data": "tempo"},
                        // {"defaultContent": ""}
                    ]
                });

                $(document).on("click", "#tablebuscaServico tbody tr", function(){		        
                    fila = $(this).closest("tr");	        
                    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
                    servico = fila.find('td:eq(1)').text();
                    valor = fila.find('td:eq(2)').text();
                    $("#id_servico").val(id);
                    $("#servico").val(servico);
                    $('.modalbuscaservico').modal('toggle');
                });

                $('#formservico').validate({});
            //função ajax showmodal serviços
            $("#formservico").submit(function(){
                event.preventDefault();
                
                var id = $(this).find('input#servico_id').val();
                var servico = $(this).find('input#servico_servico').val();
                var tempo = $(this).find('input#servico_tempo').val();
                var valor = $(this).find('input#servico_valor').val();                
                var comissao = $(this).find('input#servico_comissao').val();                
                var observacoes = $(this).find('textarea#servico_observacoes').val();                
                $.ajax({
                    url:"{{ route('registroservico.registroservico') }}",
                    type: 'POST',
                    data: { _token: '{!! csrf_token() !!}',
                        id,
                        servico,
                        tempo,
                        valor,
                        comissao,
                        observacoes
                    },
                    dataType: 'JSON',
                success:function(data) {
                        tablebuscaServico.ajax.reload(null, false);
                        $("#formservico").trigger("reset");
                        swal(data);
                        $('#modalservico').modal('toggle');
                },
                error:function(data){
                    
                    swal("Serviço não Cadastrado !");
                    
                    },            
                });
                  
            });
        
        
                       
                     
    
    });         
     
</script>