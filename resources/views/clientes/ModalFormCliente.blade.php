<div class="modal fade overflow-auto modalcliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card">
                <div class="card-header">
                    <div class="modal-header align-items-center py-2 bg-dark">
                        <div class="d-flex align-items-center">
                            <h5 class="modal-titleCliente" class="ml-3 mb-0 text-white" style="color: white">Cadastrar
                                Cliente</h5>
                        </div>
                        <button type="button" class="close text-white align-right" data-dismiss="modal">&times;</button>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="FormCliente" class="needs-validation" novalidate action="/cliente" method="POST">
                        @csrf
                        @include('clientes.fields')
                        <div class="form-row">
                            <div class="form-group col-xl-4">
                                <small>Cadastrado em:</small>
                                <input type="text" class="form-control form-control-sm" name="data_create"
                                    id="alterardata_create" readonly>
                            </div>
                            <div class="form-group col-xl-4">
                                <small>Alterado em:</small>
                                <input type="text" class="form-control form-control-sm" name="data_alt"
                                    id="alterardata_alt" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-right">
                                <button type="button" class="btn btn-dark btn-sm btncliente" value="" id="btnCliente"
                                    name="btnCliente">SALVAR</button>
                                <button class="btn btn-sm btn-dark" data-dismiss="modal">VOLTAR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
    $('#btnCliente').on('click',function(){
        
    });
});
</script>
