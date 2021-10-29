@extends('index')

@section('cabecalho')

@endsection

@section('conteudo')
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fa fa-list"></i>
                <h4 class="ml-3 mb-0">Estados</h4>
            </div>

            <div class="float-right">
                <button id="btn-adicionarEstado" type="button" class="btn btn-dark" data-toggle="modal" data-target=".modalestado"><i class="fa fa-plus"></i> Adicionar</button>
            </div>
        </div>
</div>
<style>
 .swal-button--confirm {
    background: #001100;
}

</style>   
<div class="card-body">
    @if (session('errorExcluido'))
    <script>
        swal("Registro não pode ser Excluido");
   </script> 
    @endif
    @if (session('errorUpdate'))
    <script>
        swal("Registro não pode ser Atualizado");
   </script> 
    @endif
    @if (session('excluido'))
    <script>
        swal("Estado excluido com sucesso");
   </script> 
    @endif
    @if (session('alterado'))
    <script>
        swal("Estado Alterado com Sucesso");
   </script>
    @endif
    @if (session('cadastrado'))
    <script>
        swal("Estado cadastrado com Sucesso");
   </script>
    @endif
    @include('estados.table')
    @include('estados.ModalFormEstado')
    @include('paises.showpais')
    @include('paises.ModalFormPais')
</div>

<script type="text/javascript">
    //função ajax modal pais
    $(function(){
            $('form[name="createpais"]').submit(function(){
                event.preventDefault();
                var id = $(this).find('input#id').val();
                var pais = $(this).find('input#pais').val();
                var sigla = $(this).find('input#sigla').val();
                var ddi = $(this).find('input#ddi').val();                
                $.ajax({
                    url:"{{ route('registro.registro') }}",
                    type: 'POST',
                    data: { _token: '{!! csrf_token() !!}',
                        id,
                        pais,
                        sigla,
                        ddi
                    },
                    dataType: 'JSON',
                    success:function(data) {
                        tablebuscapais.ajax.reload(null, false);
                        alert(data);
                },
                error:function( ){
                    
                    alert("Pais não Cadastrado");
                    
                    },            
                });
                
            $('#modalformPais').modal('toggle');           
            });

            $('#ModalFormEstado').validate({
                
            });
        });
       
        $('#msg').fadeOut(2500, function(){

        });

        //add ação para rota create estado 
        $("#btn-adicionarEstado").click(function(){
            $('#ModalFormEstado').attr('action', '/estado');
            $("#ModalFormEstado").trigger("reset");
                        
        });

</script>

@endsection