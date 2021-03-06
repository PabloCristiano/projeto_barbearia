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
                <button type="button" class="btn btn-dark btn-addcategoria" data-toggle="modal" data-target=".modalcategoria"><i class="fa fa-plus"></i> Adicionar</button>
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
           swal("Categoria Excluida com sucesso !!");
      </script> 
       @endif
       @if (session('alterado'))
       <script>
           swal("Categoria Alterada com sucesso !!");
      </script>
    @endif
    @if (session('cadastro'))
       <script>
           swal("Categoria Cadastrada com sucesso !!");
      </script>
    @endif
     @include('categorias.table')
     @include('categorias.ModalFormCategoria')
     @include('categorias.scriptCategoria')
</div>

@endsection