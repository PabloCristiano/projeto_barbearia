@extends('index')

@section('cabecalho')

@endsection

@section('conteudo')
<div class="card col-xl-10 mx-auto">
        <div class="card-header">
            <div class="modal-header align-items-center py-2 bg-dark">
                <div class="d-flex align-items-center">
                    <h3 class="modal-titlecondicaopg" class="ml-3 mb-0 text-white" style="color: white"> Cadastrar Condição de Pagamento </h3>
                </div>            
            </div>
        </div>
      <div class="card-body">
          <form id="modalFormCondicaopg"  name="createformapg" class="needs-validation" novalidate action="/formapagamento/store" method="POST">
              @csrf
             @include('condicaopagamento.fields')
              <div class="form-row" >
                <div class="form-group col-xl-2">
                    <small>Cadastrado em:</small>
                    <input type="text" class="form-control form-control-sm" name="data_create" id="data_create" readonly>
                </div>
                <div class="form-group col-xl-2">
                    <small>Alterado em:</small>
                    <input type="text" class="form-control form-control-sm" name="data_alt" id="data_alt" readonly>
                </div>
            </div>
              <div class="row">
                <div class="col-12 text-right">
                    <button type="submit" class="btn btn-dark btn-sm btnformapg">SALVAR</button>
                    <a href="{{'/Condicaopagamento'}}" class="btn btn-sm btn-dark" data-dismiss="modal">VOLTAR</a>
                </div>
            </div>
          </form>   
      </div>
</div>
@endsection