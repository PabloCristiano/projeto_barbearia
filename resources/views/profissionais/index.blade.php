@extends('index')

@section('cabecalho')

@endsection

@section('conteudo')
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fa fa-list"></i>
                <h4 class="ml-3 mb-0">Profissionais</h4>
            </div>
            <div class="float-right">
                <button type="button" class="btn btn-dark btn-addprofissonal" data-toggle="modal" data-target=".modalprofissional"><i class="fa fa-plus"></i> Adicionar</button>
            </div>
        </div>
</div>
<div class="card-body">
    @if (session('no'))
    <script>
        swal("Profissional não pode ser Excluido !!");
   </script> 
    @endif
    @if (session('excluido'))
    <script>
        swal("Profissional Excluido com sucesso !!");
   </script> 
    @endif
    @if (session('alterado'))
    <script>
        swal("Profissional Alterado com sucesso !!");
   </script>
 @endif
 @if (session('Cadastrado'))
    <script>
        swal("Profissional cadastrado com sucesso !!");
   </script>
 @endif
    @include('profissionais.table')
    @include('profissionais.scriptprofissional')
    @include('profissionais.ModalFormProfissional')
    @include('cidades.showcidade')   
    @include('servicos.showservico')
    @include('servicos.ModalFormServico')
</div>

@endsection