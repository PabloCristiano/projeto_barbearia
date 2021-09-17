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
              <!--  <a href="" class="btn btn-dark">
                    <i class="fa fa-plus"></i> Adicionar
                </a> -->
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".modalfornecedor"><i class="fa fa-plus"></i> Adicionar</button>
            </div>
        </div>
        @include('fornecedores.search')
</div>
<div class="card-body">
    @include('fornecedores.table')
    @include('fornecedores.ModalFormFornecedor')

</div>

@endsection