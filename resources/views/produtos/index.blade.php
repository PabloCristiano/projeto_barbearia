@extends('index')

@section('cabecalho')

@endsection

@section('conteudo')
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fa fa-list"></i>
                <h4 class="ml-3 mb-0">Produtos</h4>
            </div>
            <div class="float-right">
                <button id="btnaddproduto" type="button" class="btn btn-dark " data-toggle="modal" data-target=".modalproduto"><i class="fa fa-plus"></i> Adicionar</button>
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
           swal("Produto Excluido com sucesso !!");
      </script> 
       @endif
       @if (session('alterado'))
       <script>
           swal("Produto Alterado com sucesso !!");
      </script>
    @endif
    @if (session('Cadastrado'))
       <script>
           swal("Produto Cadastrado com sucesso !!");
      </script>
    @endif
    @include('produtos.table')
    @include('produtos.ModalFormProduto')
    @include('produtos.scriptProdutos')
    @include('categorias.ShowCategoria')
    @include('categorias.ModalFormCategoria')
    @include('fornecedores.ShowFornecedores')
    @include('fornecedores.ModalFormFornecedor')
    
</div>

@endsection