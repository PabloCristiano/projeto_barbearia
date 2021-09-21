<div class="table-responsive">
    <table id="tablecondicaopagamento" class="table table-hover table-striped shadow-xs rounded" style="width:100%">
        <thead>
            <tr>
                <th>Código</th>
                <th>Condição de Pagamento</th>
                <th>Juros</th>
                <th>Multa</th>
                <th>Desconto</th>                
                <th>Ações</th>                
            </tr>
        </thead>
        <tbody>
            @if (@isset($listacondicao))
            @foreach ($listacondicao as $condicaopg)           
                <tr>
                    <td>{{$condicaopg->id}}</td>
                    <td>{{$condicaopg->condicao_pagamento}}</td>
                    <td>{{$condicaopg->juros}}</td>
                    <td>{{$condicaopg->multa}}</td>
                    <td>{{$condicaopg->desconto}}</td>
                    <td class="text-center">
                        <div class="btn-group-xs">
                            <button  
                                    class="alterar btn btn-dark" title="EDITAR"><i class="fa fa-edit"></i></button>
    
                            <button  
                                    class="delete btn btn-dark" title="EXCLUIR"><i class="fa fa-trash-alt"></i></button>
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
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>
<script type="text/javascript">
    $(function() {

        $(document).ready(function() {
            tablecondicaopagamento = $('#tablecondicaopagamento').DataTable({
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

        

        

        




       

    });
</script>