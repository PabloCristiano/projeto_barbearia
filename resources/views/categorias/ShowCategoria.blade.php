<div class="modal fade modalbuscacategoria" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fa fa-list"></i>
                    <h5 class="ml-3 mb-0"> Categorias </h5>
                </div>
    
                <div class="float-right">
                   <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".modalcategoria"><i class="fa fa-plus"></i> Adicionar</button>
                </div>
            </div>
         </div>
         <div class="table-responsive">
            <div class="card-body"> 
                <table id="tablebuscacategoria" class="table table-hover table-striped shadow-xs rounded" style="width:100%">
                <thead>
                    <tr>
                        <th >Código</th>
                        <th >Categoria</th>

                    </tr>
                </thead>
                <tbody>
                @if (@isset($categorias))
                    @foreach ($categorias as $categoria)    
                    <tr>
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
        tablebuscacategoria = $('#tablebuscacategoria').DataTable({
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
                        "url": "{{ route('showcategoria.showcategoria') }}", 
                        "method": 'get', //usamos el metodo POST
                        "dataSrc":""
                    },
                    "columns":[
                        {"data": "id"},
                        {"data": "categoria"}
                    ]
                    
                });

                $(document).on("click", "#tablebuscacategoria tbody tr", function(){		        
                    fila = $(this).closest("tr");	        
                    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
                    categoria = fila.find('td:eq(1)').text();
                   // ddd = fila.find('td:eq(2)').text();
                    $("#id_categoria").val(id);
                    $("#categoria").val(categoria);
                    $('.modalbuscacategoria').modal('toggle');
                });


                
          
            $("#formCategoria").validate();          
            $("#formCategoria").submit(function(){  
                              
                event.preventDefault();
                var id = $(this).find('input#id').val();
                var categoria = $(this).find('input#categoria').val();                
                $.ajax({
                    url:"{{ route('registrocategoria.registrocategoria') }}",
                    type: 'POST',
                    data: { _token: '{!! csrf_token() !!}',
                        id,
                        categoria,
                    },
                dataType: 'JSON',
                success:function(data) {
                    tablebuscacategoria.ajax.reload(null, false);
                    $('#modalcategoria').modal('toggle');
                    swal("Categoria Cadastrado com Sucesso!");
                },
                error:function( ){
                    swal("Categoria não Cadastrado!");
                    
                },            
                });           
            });        
       
    });         
     
</script>