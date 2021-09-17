@extends('index')

@section('cabecalho')

@endsection

@section('conteudo')
<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="fa fa-list"></i>
                <h4 class="ml-3 mb-0">Alterar Pais</h4>
            </div>            
        </div>
</div>
<div class="card-body">
    <form class="needs-validation" novalidate action="/pais" method="POST">
        @csrf
          <div class="form-row">
            <div class="form-group col-md-1">
                <label for="id">Codigo</label>
                <input type="text" class="form-control" name="id" 
                       id="id" placeholder=""  value="{{$pais->id}}" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="pais">País</label>
                <input type="text" class="form-control" name="pais" id="pais" value="{{$pais->pais}}" required>                             
            </div>
            <div class="form-group col-md-2">
                <label for="sigla">Sigla</label>
                <input type="text" class="form-control" name="sigla" id="sigla" value="{{$pais->sigla}}" required>
            </div>
            <div class="form-group col-md-2">
                <label for="ddi">DDI</label>
                <input type="text" class="form-control" name="ddi" id="ddi" value="{{$pais->ddi}}" required>
            </div>
          </div>
          <div class="row">
            <div class="col-12 text-right">
                <button type="submit" class="btn btn-dark btn-sm">SALVAR</button>
                <button class="btn btn-sm btn-dark" data-dismiss="modal">VOLTAR</button>
            </div>
            <div class="d-flex flex-column justify-content-center text-secondary">
                <small><b>Cadastrado em: {{$pais->data_create}} </small>
                <small><b>Alterado em: {{$pais->data_alt}} </small><br>
              </div>
          </div>
    </form>   
</div>


<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    
</script>

@endsection