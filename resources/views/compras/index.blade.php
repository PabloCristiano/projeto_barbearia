@extends('index')

@section('cabecalho')

@endsection

@section('conteudo')
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fa fa-list"></i>
                    <h4 class="ml-3 mb-0">Compras</h4>
                </div>
                <div class="float-right">
                    <a href="compras/adicionar" class="btn btn-dark"><i class="fa fa-plus"></i> Adicionar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        @include('compras.table')
        @include('compras.scriptCompras')

    </div>

@endsection
