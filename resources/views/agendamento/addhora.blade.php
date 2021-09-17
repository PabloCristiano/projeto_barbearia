@extends('index')
@section('cabecalho')
@endsection
@section('conteudo')
    <div class="card mx-auto">
        <div class="card-header">

            <div class="d-flex align-items-center">
                <i class="fa fa-list"></i>
                <h4 class="ml-3 mb-0">Agendamento</h4>
            </div>

        </div>
        <div class="card-body">

            
            @include('agendamento.calendario')
           
        </div>

    @endsection
