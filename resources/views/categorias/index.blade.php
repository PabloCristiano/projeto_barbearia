@extends('index')

@section('cabecalho')

@endsection

@section('conteudo')
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fa fa-list"></i>
                <h4 class="ml-3 mb-0">Categorias</h4>
            </div>

            <div class="float-right">
              <!--  <a href="" class="btn btn-dark">
                    <i class="fa fa-plus"></i> Adicionar
                </a> -->
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".modalcategoria"><i class="fa fa-plus"></i> Adicionar</button>
            </div>
        </div>
        @include('categorias.search')       
</div>
<div class="card-body">
     @include('categorias.table')
     @include('categorias.ModalFormCategoria')
</div>

@endsection