@extends('index')

@section('cabecalho')

@endsection

@section('conteudo')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fa fa-list"></i>
                    <h4 class="ml-3 mb-0">Clientes</h4>
                </div>

                <div class="float-right">
                    <!--  <a href="" class="btn btn-dark">
                        <i class="fa fa-plus"></i> Adicionar
                    </a> -->
                    <button type="button" class="btn btn-dark btnaddcliente" data-toggle="modal"
                        data-target=".modalcliente"><i class="fa fa-plus"></i> Adicionar</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (session('errorExcluido'))
                <script>
                    swal("Registro não pode ser Excluido !!");
                </script>
            @endif
            @if (session('excluido'))
                <script>
                    swal("Cliente Excluido com sucesso !!");
                </script>
            @endif
            @if (session('alterado'))
                <script>
                    swal("Cliente Alterado com sucesso !!");
                </script>
            @endif
            @if (session('Cadastrado'))
                <script>
                    swal("Cliente cadastrado com sucesso !!");
                </script>
            @endif

            @include('clientes.table')
            @include('clientes.ModalFormCliente')
            @include('clientes.ScriptCliente')
            @include('cidades.showcidade')
            @include('condicaopagamento.showCondicaoPagamento')


        </div>

    @endsection
