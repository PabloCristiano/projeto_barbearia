<div class="modal fade modalbuscacidade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fa fa-list"></i>
                    <h3 class="ml-3 mb-0"> Cidades </h3>
                </div>
    
                <div class="float-right">
                   <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".modalcidade"><i class="fa fa-plus"></i> Adicionar</button>
                </div>
            </div>
         </div>
         <div class="table-responsive">
            <div class="card-body"> 
                <table id="tablebuscacidade" class="table table-hover table-striped shadow-xs rounded" style="width:100%">
                <thead>
                    <tr>
                        <th >Código</th>
                        <th >Cidade</th>
                        <th >DDD</th>
                        <th >Estado</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                
                @if (@isset($cidades))
                    @foreach ($cidades as $cidade)    
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
    @include('cidades.ModalFormCidade')
    @include('estados.showestado')
    @include('estados.ModalFormEstado')
    @include('paises.showpais')
    @include('paises.ModalFormPais')
<script type="text/javascript">

    //função para popular datatable
$(document).ready(function() {
        tablebuscacidade = $('#tablebuscacidade').DataTable({
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
                        "url": "{{ route('showcidades.showcidades') }}", 
                        "method": 'get', //usamos el metodo POST
                        "dataSrc":""
                    },
                    "columns":[
                        {"data": "id"},
                        {"data": "cidade"},
                        {"data": "ddd"},
                        {"data": "estado"},
                        {"defaultContent": ""}
                    ]
                });

                $(document).on("click", "#tablebuscacidade tbody tr", function(){		        
                    fila = $(this).closest("tr");	        
                    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
                    cidade = fila.find('td:eq(1)').text();
                    ddd = fila.find('td:eq(2)').text();
                    $("#id_cidade").val(id);
                    $("#cidade").val(cidade);
                    $('.modalbuscacidade').modal('toggle');
                });


                //função ajax create cidade
            $(function(){
            $("#modalFormcidade").submit(function(){
                event.preventDefault();
                var id = $(this).find('input#id').val();
                var cidade = $(this).find('input#cidade_cidade').val();
                var ddd = $(this).find('input#cidade_ddd').val();
                var id_estado = $(this).find('input#cidade_estado_id').val();                
                $.ajax({
                    url:"{{ route('registrocidade.registrocidade') }}",
                    type: 'POST',
                    data: { _token: '{!! csrf_token() !!}',
                        id,
                        cidade,
                        ddd,
                        id_estado
                    },
                    dataType: 'JSON',
                    success:function(data) {
                        tablebuscacidade.ajax.reload(null, false);
                        $('#modalcidade').modal('toggle');
                        swal("Cidade Cadastrado com Sucesso!");
                       // alert(data);
                },
                error:function( ){
                    swal("Cidade não Cadastrado!");
                    //alert("Pais não Cadastrado");
                    
                    },            
                });
                
                       
            });
           });

           //função ajax modal pais
           $("#formpais").validate();
           $("#ModalFormEstado").validate();
           $("#modalFormcidade").validate();
         $(function(){
            $('form[name="createpais"]').submit(function(){
                event.preventDefault();
                var id = $(this).find('input#id').val();
                var pais = $(this).find('input#pais').val();
                var sigla = $(this).find('input#sigla').val();
                var ddi = $(this).find('input#ddi').val();                
                $.ajax({
                    url:"{{ route('registro.registro') }}",
                    type: 'POST',
                    data: { _token: '{!! csrf_token() !!}',
                        id,
                        pais,
                        sigla,
                        ddi
                    },
                    dataType: 'JSON',
                    success:function(data) {
                        tablebuscapais.ajax.reload(null, false);
                        $('#modalformPais').modal('toggle');
                        
                       // alert(data);
                },
                error:function( ){
                    swal("Pais não Cadastrado !");
                    
                },            
                });
                                    
            });
        });
       
        $('#msg').fadeOut(2500, function(){

        });

        
            $('form[name="createestado"]').submit(function(){
                event.preventDefault();
                var id = $(this).find('input#alterar_id').val();
                var estado = $(this).find('input#alterar_estado').val();
                var uf = $(this).find('input#alterar_uf').val();
                var id_pais = $(this).find('input#alterar_idpais').val();                
                $.ajax({
                    url:"{{ route('registroestado.registroestado') }}",
                    type: 'POST',
                    data: { _token: '{!! csrf_token() !!}',
                        id,
                        estado,
                        uf,
                        id_pais
                    },
                    dataType: 'JSON',
                    success:function(data) {
                        tablebuscaestado.ajax.reload(null, false);
                        $('#modalestado').modal('toggle');
                        swal("Estado Cadastrado com Sucesso!");
                },
                error:function( ){                
                    swal("Estado não Cadastrado !");    
                },            
                
                
                });      
            });
        
        
                       
                     
    
    });         
     
</script>