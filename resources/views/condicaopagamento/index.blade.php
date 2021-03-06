@extends('index')

@section('cabecalho')

@endsection

@section('conteudo')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fa fa-list"></i>
                    <h4 class="ml-3 mb-0">Condições de Pagamento</h4>
                </div>

                <div class="float-right">
                    <button type="button" class="btn btn-dark btnaddcondicaopg" data-toggle="modal"
                        data-target=".modalcondicaopg"><i class="fa fa-plus"></i> Adicionar</button>
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
                    swal("Condição de Pagamento Excluido com sucesso !!");
                </script>
            @endif
            @if (session('alterado'))
                <script>
                    swal("Condição de Pagamento Alterado com sucesso !!");
                </script>
            @endif
            @if (session('error'))
                <script>
                    swal("Registro não pode ser Alterado !!");
                </script>
            @endif
            @include('condicaopagamento.ModalFormCondicaoPagamento')
            @include('condicaopagamento.table')
            @include('condicaopagamento.scriptCondicaoPagamento')
            @include('condicaopagamento.ModalFormParcela')
        </div>
        <!--FIM Card-Boddy-->
    </div>
@endsection
