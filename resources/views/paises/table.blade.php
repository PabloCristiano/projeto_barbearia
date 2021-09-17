<div class="table-responsive">
    <table id="tablepais" class="table table-hover table-striped shadow-xs rounded" style="width:100%">
        <thead>
            <tr>
                <th class="th-sm">Código</th>
                <th class="th-sm">País</th>
                <th class="th-sm">Sigla</th>
                <th class="th-sm">DDI</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
        @if (@isset($paises))
           @foreach ($paises as $pais)    
            <tr>
                <td>{{ $pais->getid() }}</td>
                <td>{{ $pais->getpais() }}</td>
                <td>{{ $pais->getsigla()}}</td>
                <td>{{ $pais->getddi() }}</td>
                <td class="text-center">
                    <div class="btn-group-xs">
                        <button data-nome="{{ $pais->getpais() }}" 
                                data-id="{{$pais->getid() }}" 
                                data-sigla ="{{$pais->getsigla()}}" 
                                data-ddi="{{$pais->getddi()}}" 
                                data-codigo ="{{$pais->getid() }}" 
                                data-data_create="{{$pais->getDataCadastro()}}" 
                                data-data_alt="{{$pais->getDataAlteracao()}}" 
                                class="alterar btn btn-dark"><i class="fa fa-edit"></i></button>

                        <button data-nome="{{ $pais->getpais() }}" 
                                data-id="{{ $pais->getid() }}" 
                                data-sigla ="{{ $pais->getsigla() }}" 
                                data-ddi="{{ $pais->getddi() }}" 
                                data-codigo ="{{$pais->getid() }}"
                                data-data_create="{{$pais->getDataCadastro()}}" 
                                data-data_alt="{{$pais->getDataAlteracao()}}" 
                                class="delete btn btn-dark"><i class="fa fa-trash-alt"></i></button>
                    </div>
                </td>
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
<script type="text/javascript">
    $(function(){
        $(document).ready(function() {
            $('#tablepais').DataTable({
                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoThousands": ".",
                    "sLengthMenu": "resultados _MENU_  por página",
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
        } );



    });
  </script>
</div>
