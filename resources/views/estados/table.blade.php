<div class="table-responsive">
    <table id="tableestado" class="table table-hover table-striped shadow-xs rounded" style="width:100%">
        <thead>
            <tr>
                <th>Código</th>
                <th>Estado</th>
                <th>UF</th>
                <th>País</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody> 
           
          @if (@isset($estados))
            @foreach ($estados as $estado)
            <tr>
                <td>{{$estado->getId()}}</td>
                <td>{{$estado->getEstado()}}</td>
                <td>{{$estado->getuf()}}</td>
                <td>{{$estado->getpais()->getpais()}}</td>
                <td class="text-center">
                    <div class="btn-group-xs">
                        <button data-cod="{{$estado->getId()}}"
                                data-estado="{{$estado->getEstado()}}"
                                data-uf="{{$estado->getuf()}}"
                                data-pais="{{$estado->getpais()->getpais()}}"
                                data-idpais="{{$estado->getpais()->getid()}}"
                                data-data_create="{{$estado->getdatacadastro()}}"
                                data-data_alt="{{$estado->getdataalteracao()}}"
                           class="btn btn-dark alterar"><i class="fa fa-edit"></i></button>
                           
                           <button data-cod="{{$estado->getId()}}"
                                    data-estado="{{$estado->getEstado()}}"
                                    data-uf="{{$estado->getuf()}}"
                                    data-pais="{{$estado->getpais()->getpais()}}"
                                    data-idpais="{{$estado->getpais()->getid()}}"
                                    data-data_create ="{{$estado->getdatacadastro()}}"
                                    data-data_alt="{{$estado->getdataalteracao()}}"
                                    class="btn btn-dark excluir"><i class="fa fa-trash-alt"></i></button>
                        

                       
                       
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
                <th ></th>
            </tr>
        </tfoot>
    </table>
</div>
<script type="text/javascript">
$(function(){

    $(document).ready(function() {
        $('#tableestado').DataTable({
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


        $('.alterar').on('click', function(){
            var cod = $(this).data('cod'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
            var estado = $(this).data('estado'); // vamos buscar o valor do atributo data-id
            var uf = $(this).data('uf');
            var pais = $(this).data('pais');
            var idpais = $(this).data('idpais');
            var DataCadastro = $(this).data('data_create');
            var DataAlteracao = $(this).data('data_alt');
            $("input").prop("disabled", false);
            $("#alterar_id").val(cod); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#alterar_estado").val(estado); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#alterar_uf").val(uf); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#alterar_idpais").val(idpais); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#alterar_pais").val(pais); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#alterardata_create").val(DataCadastro); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#alterardata_alt").val(DataAlteracao); // inserir na o nome na pergunta de confirmação dentro da modal
            $(".modal-header").css("background-color", "#343a40");
            $(".modal-header").css("color", "white" );
            $(".btn.btn-dark.btn-estado").text("ALTERAR");
            $(".modal-titleestado").text(" Editar Estado ");
            $('#ModalFormEstado').attr('method', 'post');
            $('#ModalFormEstado').attr('action', '/estado/alterar');
            $('.modalestado').modal('show'); // modal aparece
        });

        $('.excluir').on('click', function(){
            var cod = $(this).data('cod'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
            var estado = $(this).data('estado'); // vamos buscar o valor do atributo data-id
            var uf = $(this).data('uf');
            var pais = $(this).data('pais');
            var idpais = $(this).data('idpais');
            var Data_Cadastro = $(this).data('data_create');
            var Data_Alteracao = $(this).data('data_alt');
            $("input").prop("disabled", true);
            $('input[type="search"]').prop("disabled", false);
            $("#alterar_id").val(cod); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#alterar_estado").val(estado); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#alterar_uf").val(uf); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#alterar_idpais").val(idpais); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#alterar_pais").val(pais); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#alterardata_create").val(Data_Cadastro); // inserir na o nome na pergunta de confirmação dentro da modal
            $("#alterardata_alt").val(Data_Alteracao); // inserir na o nome na pergunta de confirmação dentro da modal
            $(".modal-header").css("background-color", "#343a40");
            $(".modal-header").css("color", "white" );
            $(".btn.btn-dark.btn-estado").text("EXCLUIR");
            $(".modal-titleestado").text(" Excluir Estado ");
            $('#ModalFormEstado').attr('method', 'get');
            $('#ModalFormEstado').attr('action', '/estado/excluir/' + cod);
            $('.modalestado').modal('show'); // modal aparece
        });

        $("#btn-adicionarEstado").click(function(){
            $('#ModalFormEstado').attr('method', 'post');
            $('#ModalFormEstado').attr('action', '/estado');
            $(".modal-titleestado").text(" Cadastrar Estado ");
            $(".btn.btn-dark.btn-estado").text("SALVAR");
            $("input").prop("disabled", false);
            $("#ModalFormEstado").trigger("reset");    
        });



    });
});
</script>