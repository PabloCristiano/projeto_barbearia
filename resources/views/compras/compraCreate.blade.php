@extends('index')

@section('cabecalho')

@endsection

@section('conteudo')
<div class="card-body">
    @include('compras.fields')
    @include('compras.scriptCompras')

</div>

@endsection