<div class="card col-6 p-0  mx-auto">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <h3 class="ml-3 mb-0">Novo Agendamento</h3>
        </div>
    </div>
    <div class="card-body">
        <form id="formAgendamento" action="/agendamendo/create" method="post"> 
            @csrf
            <div class="form-row">
                <div class="form-group col-xl-2">
                    <label>Código *</label>
                    <input type="number" id="id_profissional" name="id_profissional" class="form-control" required>
                </div>
                <div class="form-group  col-xl-10" >
                    <label>Profissional *</label>
                    <div class="input-group">
                        <input class="form-control" name="profissional" id="profissional" value=""
                            style="text-transform:uppercase;" required readonly>

                        <div class="input-group-append">
                            <button class="btn btn-dark btn-search" type="button" data-toggle="modal"
                                data-target=".modalShowProfissional">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-xl-2">
                    <label>Código *</label>
                    <input type="number" id="id_servico" name="id_cidade" class="form-control "required>
                </div>
                <div class="form-group  col-xl-10">
                    <label>Serviço *</label>
                    <div class="input-group">
                        <input class="form-control" name="servico" id="servico" data-error="#ipt-cidade"
                            style="text-transform:uppercase;" required readonly>

                        <div class="input-group-append">
                            <button class="btn btn-dark btn-search" type="button" data-toggle="modal"
                                data-target=".modalbuscaservico">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col ">
                    <button id="btnagenda" type="button" class="btn btn-dark">Pesquisar Horário</button>
                </div>
            </div><br>

            <div class="form-row">
                <div class="form-group col-xl-2">
                    <label>Código *</label>
                    <input type="number" id="id_cliente" name="id_cliente" class="form-control " required>
                </div>
                <div class="form-group  col-xl-6">
                    <label>Apelido *</label>
                    <div class="input-group">
                        <input class="form-control" name="cliente" id="cliente" data-error="#ipt-cidade"
                            style="text-transform:uppercase;" required readonly>

                        <div class="input-group-append">
                            <button class="btn btn-dark btn-search" type="button" data-input=""
                                data-route="" data-toggle="modal" data-target=".modalShowCliente">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group col-xl-4">
                    <label>Contato *</label>
                    <input type="text" id="telefone" name="telefone" class="form-control " readonly>
                </div>
            </div>
            <div class="form-row d-flex justify-content-center">
                <div class="form-group col-xl-5 ">
                    <label>Data do Agendamento</label>
                    <input type="date" id="dataAgendamento" name="dataAgendamento" class="form-control " required readonly>
                </div>
                <div class="form-group  col-xl-5">
                    <label>Hora do Agendamento</label>
                    <input type="text" id="horaAgendamento" name="horaAgendamento" class="form-control"
                        style="text-transform:uppercase;" required readonly>
                </div>
            </div>
            <div class="form-group col-xl-12 px-0">
                <label for="observacoes">Observações</label>
                <textarea name="observacoes" id="servico_observacoes" class="form-control" rows="3"></textarea>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-dark ">AGENDAR</button>
                <button type="button" class="btn btn-dark">SAIR</button>
            </div>
        </form>
    </div>
   
    @include('servicos.showservico')
    @include('profissionais.showProfissional')
    @include('clientes.showCliente')
</div>
@include('agendamento.ModalAgendamento')
<script>
    $(document).ready(function() {
        $("#id_profissional").autocomplete({
            source: function(resquest, response) {
                $.ajax({
                    url: "{{ route('searchProfissional') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        _token: '{!! csrf_token() !!}',
                        search: resquest.term
                    },
                    success: function(data) {                        
                        $('#id_profissional').val(data[0].id);
                        $('#profissional').val(data[0].profissional);
                    },
                    error:function(){
                        return false;
                    }
                });
            },
        });

        $("#id_servico").autocomplete({
            source: function(resquest, response) {
                $.ajax({
                    url: "{{ route('searchServico') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        _token: '{!! csrf_token() !!}',
                        search: resquest.term
                    },
                    success: function(data) {                        
                        $('#id_servico').val(data[0].id);
                        $('#servico').val(data[0].servico);
                    },
                    error:function(){
                        return false;
                    }
                });
            },
        });

        $("#id_cliente").autocomplete({
            source: function(resquest, response) {
                $.ajax({
                    url: "{{ route('searchCliente') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        _token: '{!! csrf_token() !!}',
                        search: resquest.term
                    },
                    success: function(data) {                        
                        $('#id_cliente').val(data[0].id);
                        $('#cliente').val(data[0].cliente);
                        $('#telefone').val(data[0].telefone);
                    },
                    error:function(data){
                        return false;
                    }
                });
            },
        });



    });
</script>
