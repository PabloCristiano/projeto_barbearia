<div class="modal fade  modalShowCliente"  role="document" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modalPesonalizado">
        <div class="modal-content">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fa fa-list"></i>
                    <h3 class="ml-3 mb-0">Clientes</h3>
                </div>
            </div>
         </div>
         <div class="table-responsive">
            <div class="card-body"> 
                <table id="tableShowCliente" class="table table-hover table-striped shadow-xs rounded" style="width:100%">
                <thead>
                    <tr>
                        <th >Código</th>
                        <th >Nome</th>
                        <th >Contato</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <th></th>
                        
                    </tr> 
                </tbody>
        
                <tfoot>
                    <tr>
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
  <style>
    #tableShowProfissional tr th:nth-child(1){
        width: 20%;
    }
    #tableShowProfissional tr th:nth-child(2){
        width: 80%;
    }   
</style>
<script type="text/javascript">
    //função para popular datatable
    $(document).ready(function() {
        tableShowCliente = $('#tableShowCliente').DataTable({
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
                        "url": "{{ route('showClientes') }}", 
                        "method": 'get', //usamos el metodo POST
                        "dataSrc":""
                    },
                    "columns":[
                        {"data": "id"},
                        {"data": "cliente"},
                        {"data": "telefone"},
                    ]
                });

                $(document).on("click", "#tableShowCliente tbody tr", function(){		        
                    fila = $(this).closest("tr");	        
                    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
                    cliente = fila.find('td:eq(1)').text();
                    telefone = fila.find('td:eq(2)').text();
                    $("#id_cliente").val(id);
                    $("#cliente").val(cliente);
                    $("#telefone").val(telefone);
                    $('.modalShowCliente').modal('toggle');
                });

                   
        
                       
                     
    
    });         
     
</script>