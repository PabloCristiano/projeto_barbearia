@extends('index')

@section('cabecalho')

@endsection

@section('conteudo')
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fa fa-list"></i>
                <h4 class="ml-3 mb-0">Países</h4>
            </div>

            <div class="float-right">
              <!-- <a href="pais/adicionar" class="btn btn-dark"><i class="fa fa-plus"></i> Adicionar</a> -->
               <button type="button" class="btn btn-dark btnAddpais" data-toggle="modal" data-target=".modalpais"><i class="fa fa-plus"></i> Adicionar</button>
              <!-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".ModalEditPais"><i class="fa fa-plus"></i> EDIT</button> -->
            </div>
        </div>
</div>
<style>
    .swal-button--confirm {
       background: #001100;
   }
   
   </style>   
   <div class="card-body">
       @if (session('alert'))
       <script>
           swal("País não pode ser Excluido !!"," ");
      </script> 
       @endif
       @if (session('warning'))
       <script>
           swal("País Excluido com sucesso !!"," ");
      </script> 
       @endif
       @if (session('info'))
       <script>
           swal("País Alterado com sucesso !!"," ");
      </script>
    @endif
    @if (session('success'))
       <script>
           swal("País cadastrado com sucesso !!"," ");
      </script>
    @endif
    @include('paises.table')
    @include('paises.ModalFormPais')
    @include('paises.ModalEditPais')
    @include('paises.ModalDeletePais')   
</div>
</div>
<script type="text/javascript">      
      $('#msg').fadeOut(2500, function(){

        });
        //add ação para roda create pais 
        $(".btnAddpais").click(function(){
            $('#formpais').attr('action', '/pais');
            $("#formpais").trigger("reset");            
        });

</script>

@endsection