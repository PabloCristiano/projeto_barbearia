@extends('index')

@section('cabecalho')

@endsection

@section('conteudo')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fa fa-list"></i>
                    <h4 class="ml-3 mb-0">Fornecedores</h4>
                </div>

                <div class="float-right">
                    <button type="button" class="btn btn-dark btn-addfornecedor" data-toggle="modal"
                        data-target=".modalfornecedor"><i class="fa fa-plus"></i> Adicionar</button>
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
                    swal("Fornecedor Excluido com sucesso !!");
                </script>
            @endif
            @if (session('alterado'))
                <script>
                    swal("Fornecedor Alterado com sucesso !!");
                </script>
            @endif
            @if (session('cadastrado'))
                <script>
                    swal("Fornecedor cadastrado com sucesso !!");
                </script>
            @endif
            @include('fornecedores.table')
            @include('fornecedores.ModalFormFornecedor')
            @include('fornecedores.scriptFornecedores')
            @include('condicaopagamento.showCondicaoPagamento')

        </div>

    @endsection
