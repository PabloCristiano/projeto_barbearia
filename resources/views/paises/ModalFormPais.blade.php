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
                                        <input type="text" class="form-control" name="pais" id="pais" placeholder="Digite um País" maxlength="50" minlength="03"  required style="text-transform:uppercase;" >               
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="sigla">Sigla  *</label>
                                        <input type="text" class="form-control" name="sigla" id="sigla" placeholder="Sigla" style="text-transform:uppercase;" pattern="[a-zA-Z\s]+$" required> 
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="ddi">DDI *</label>
                                        <input type="text" class="form-control" name="ddi" id="ddi" placeholder="DDI" pattern="[0-9-+]+$" style="text-transform:uppercase;" required> 
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
$(function(){
//Limpar Fomulario
    $(document).ready(function() {
        $('#modalformPais').on('hidden.bs.modal', function() {
          console.log('fechar modal')
          $(this).find('input:text').val('');
          $(this).find('input:number').val('');
        });

      });
      $('#formpais').validate({});


});     
  </script>