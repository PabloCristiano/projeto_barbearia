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
        </div>
    </div>
   <div class="card-body">
    
    @include('condicaopagamento.formEditarCondicao')

   </div><!--FIM Card-Boddy-->
</div>
@endsection