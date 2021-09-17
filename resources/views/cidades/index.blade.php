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
    @if (session('success'))
        <script>
            swal("Cidade cadastrado com sucesso !!"," ");
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
            $('form[name="createpais"]').submit(function(){
                event.preventDefault();
                var id = $(this).find('input#id').val();
                var pais = $(this).find('input#pais').val();
                var sigla = $(this).find('input#sigla').val();
                var ddi = $(this).find('input#ddi').val();                
                $.ajax({
                    url:"{{ route('registro.registro') }}",
                    type: 'get',
                    data: { _token: '{!! csrf_token() !!}',
                        id,
                        pais,
                        sigla,
                        ddi
                    },
                    dataType: 'JSON',
                    success:function(data) {
                        tablebuscapais.ajax.reload(null, false);
                        swal("Pais Cadastrado com Sucesso!");
                       // alert(data);
                },
                error:function( ){
                    swal("Pais não Cadastrado!");
                    //alert("Pais não Cadastrado");
                    
                    },            
                });
                
            $('#modalformPais').modal('toggle');           
            });
        });
       
        $('#msg').fadeOut(2500, function(){

        });

        
            $('form[name="createestado"]').submit(function(){
                event.preventDefault();
                var id = $(this).find('input#alterar_id').val();
                var estado = $(this).find('input#alterar_estado').val();
                var uf = $(this).find('input#alterar_uf').val();
                var id_pais = $(this).find('input#alterar_idpais').val();                
                $.ajax({
                    url:"{{ route('registroestado.registroestado') }}",
                    type: 'get',
                    data: { _token: '{!! csrf_token() !!}',
                        id,
                        estado,
                        uf,
                        id_pais
                    },
                    dataType: 'JSON',
                    success:function(data) {
                        tablebuscaestado.ajax.reload(null, false);
                        alert(data);
                },
                error:function( ){
                    
                    alert("Estado não Cadastrado");
                    
                    },            
                });

                $('#modalestado').modal('toggle');
                      
            });
            

</script>

@endsection