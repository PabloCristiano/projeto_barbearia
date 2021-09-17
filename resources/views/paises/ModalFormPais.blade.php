<div id="modalformPais" class="modal fade modalpais" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
     <div class="modal-content">
        <div class="card">
            <div class="card-header">
                <div class="modal-header align-items-center py-2 bg-dark">
                    <div class="d-flex align-items-center">
                        <h4 class="ml-3 mb-0 text-white">Cadastrar País</h4>
                    </div>
                    <button type="button" class="close text-white align-right" data-dismiss="modal">&times;</button>            
                </div>
            </div>
          <form id="formpais" class="needs-validation" novalidate action=" " method="POST" name="createpais">    
            <div class="card-body"> 
                    @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-1">
                                        <label for="id">Código</label>
                                        <input type="text" class="form-control" name="id" id="id" value="" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pais">País *</label>
                                        <input type="text" class="form-control" name="pais"id="pais" placeholder="Digite um País" required>               
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="sigla">Sigla  *</label>
                                        <input type="text" class="form-control" name="sigla" id="sigla" placeholder="Sigla" required> 
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="ddi">DDI *</label>
                                        <input type="number" class="form-control" name="ddi" id="ddi" placeholder="DDI" required> 
                                    </div>
                                </div>
                                <div class="form-row" >
                                    <div class="form-group col-xl-4">
                                        <small>Cadastrado em:</small>
                                        <input type="text" class="form-control form-control-sm" name="data_create" id="data_create" readonly>
                                    </div>
                                    <div class="form-group col-xl-4">
                                        <small>Alterado em:</small>
                                        <input type="text" class="form-control form-control-sm" name="data_alt" id="data_alt" readonly>
                                    </div>
                                </div>                      
                                   
            </div>
            <div class="modal-footer">
                <button id="btnsalvarpais" type="submit" class="btn btn-dark btn-sm">SALVAR</button>
                <button class="btn btn-sm btn-dark" data-dismiss="modal">VOLTAR</button>
            </div>          
          </form>
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
        $('#modalformPais').on('hidden.bs.modal', function() {
          console.log('fechar modal')
          $(this).find('input:text').val('');
          $(this).find('input:number').val('');
        });

      });
  </script>