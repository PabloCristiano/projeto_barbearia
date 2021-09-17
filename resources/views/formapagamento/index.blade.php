@extends('index')

@section('cabecalho')

@endsection

@section('conteudo')
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fa fa-list"></i>
                <h4 class="ml-3 mb-0">Formas de Pagamento</h4>
            </div>

            <div class="float-right">              
               <button type="button" class="btn btn-dark btnaddformapg" data-toggle="modal" data-target=".modalformapg"><i class="fa fa-plus"></i> Adicionar</button>
            </div>
        </div>
    </div>
   <div class="card-body"><!-- inicio card-body-->
     @include('formapagamento.table')
     @include('formapagamento.ModalFormFormaPagamento')
    

   </div><!--FIM Card-Boddy-->
</div>
@include('formapagamento.scriptFormaPagamento')
@endsection
