<div id="modalbuscapais" class="modal fade modalbuscapais" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fa fa-list"></i>
                    <h3 class="ml-3 mb-0"> Países </h3>
                    <button type="button" class="close text-white align-right" data-dismiss="modal">&times;</button>
                </div>
                <div class="float-right">
                 <!--  <a href="pais/adicionar" class="btn btn-dark"><i class="fa fa-plus"></i> Adicionar</a> -->
                   <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".modalpais"><i class="fa fa-plus"></i> Adicionar</button>
                </div>
            </div>        
          </div>
          <div class="table-responsive">
            <div class="card-body"> 
                <table id="tablebuscapais" class="table table-hover table-striped shadow-xs rounded" style="width:100%">
                <thead>
                    <tr>
                        <th >Código</th>
                        <th >País</th>
                        <th >Sigla</th>
                        <th >DDI</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                @if (@isset($paises))
                    @foreach ($paises as $pais)    
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        
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
    tablebuscapais = $('#tablebuscapais').DataTable({
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
                    "url": "{{ route('showpais.showpais') }}", 
                    "method": 'get', //usamos el metodo POST
                    "dataSrc":""
                },
                "columns":[
                    {"data": "id"},
                    {"data": "pais"},
                    {"data": "sigla"},
                    {"data": "ddi"},
                    {"defaultContent": ""}
                ]
            });

        //função para carregar valor para o formulario
        $(document).on("click", "#tablebuscapais tbody tr", function(){		        
            fila = $(this).closest("tr");	        
            id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
            pais = fila.find('td:eq(1)').text();
            sigla = fila.find('td:eq(2)').text();
            $("#alterar_idpais").val(id);
            $("#alterar_pais").val(pais);
            $('#modalbuscapais').modal('hide');
        });            
                 

});         
 
</script>