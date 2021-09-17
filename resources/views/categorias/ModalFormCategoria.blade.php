<div class="modal fade modalcategoria" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="card">
            <div class="card-header">
                <div class="modal-header align-items-center py-2 bg-dark">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-list text-white"></i>
                        <h4 class="ml-3 mb-0 text-white">Cadastrar Categoria</h4>
                    </div>
                    <button type="button" class="close text-white align-right" data-dismiss="modal">&times;</button>            
                </div>
            </div>
          <div class="card-body">
              <form class="needs-validation" novalidate action="/categoria" method="POST">
                  @csrf
                  @include('categorias.fields')
                  <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-dark btn-sm">SALVAR</button>
                        <button class="btn btn-sm btn-dark" data-dismiss="modal">VOLTAR</button>
                    </div>
                    <div class="d-flex flex-column justify-content-center text-secondary">
                      <small><b>Cadastrado em: </small>
                      <small><b>Alterado em: </small>
                    </div>
                </div>
              </form>   
          </div>
      </div>
    </div>
  </div>
</div>
<script>
  //Validação formulario
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
  //Limpar Fomulario
  $(document).ready(function() {
      $('.modal').on('hidden.bs.modal', function() {
        console.log('fechar modal')
        $(this).find('input:text').val('');
      });
    });
</script>