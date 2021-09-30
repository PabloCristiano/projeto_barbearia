@extends('index')

@section('cabecalho')

@endsection

@section('conteudo')
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fa fa-list"></i>
                <h4 class="ml-3 mb-0">Cidades</h4>
            </div>

            <div class="float-right">
              <!--  <a href="" class="btn btn-dark">
                    <i class="fa fa-plus"></i> Adicionar
                </a> -->
                <button type="button" class="btn btn-dark btn-addcidade" data-toggle="modal" data-target=".modalcidade"><i class="fa fa-plus"></i> Adicionar</button>
            </div>
        </div>
</div>
<div class="card-body">
    @if (session('cadastrado'))
        <script>
            swal("Cidade cadastrada com sucesso !!");
        </script>
   @endif
    @if (session('alterado'))
        <script>
            swal("Cidade alterada com sucesso !!");
        </script>
   @endif
    @if (session('excluido'))
        <script>
            swal("Cidade excluída com sucesso !!");
        </script>
   @endif
    @if (session('errorExcluido'))
        <script>
            swal("Registro não pode ser Excluído !!");
        </script>
   @endif
    @include('cidades.table')
    @include('cidades.ModalFormCidade')
    @include('estados.showestado')
    @include('estados.ModalFormEstado')
    @include('paises.showpais')
    @include('paises.ModalFormPais')
    @include('cidades.scriptCidade')
</div>

<script type="text/javascript">
    //função ajax modal pais    
$(function(){
    $("#formpais").validate();
    $("#ModalFormEstado").validate();
   
            $('form[name="createpais"]').submit(function(event){                
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
                        $('#modalformPais').modal('toggle');
                        swal("Pais Cadastrado com Sucesso!");
                },
                error:function( ){
                    swal("Pais não Cadastrado!");
                    
                },            
                });           
            });
        });
                
            $('form[name="createestado"]').submit(function(event){
                event.preventDefault();
                $( "#msgestado" ).remove();                 
                $.ajax({
                    url:"{{ route('registroestado.registroestado') }}",
                    type: 'POST',
                    data: $(this).serialize(),
                dataType: 'JSON',
                success:function(data){                         
                        console.log(data);
                        if(data.success === false){                            
                             $('#estado').append('<p id="msgestado" class="text-danger">'+data.message+'</p>');
                             swal("Estado não Cadastrado!",'Por favor verificar os Campos');
                        }else{
                            tablebuscaestado.ajax.reload(null, false);
                            $('#modalestado').modal('toggle');
                            swal("Estado Cadastrado !"); 
                        }
                },
                error:function(){
                    swal("Estado não Cadastrado !");
                },            
              });
            });
            

</script>

@endsection