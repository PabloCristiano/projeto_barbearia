<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="Alterar_pais">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="card">
          <div class="card-header">
            <div class="modal-header align-items-center py-2 bg-dark" >
                  <div class="d-flex align-items-center">
                      <h4 class="ml-3 mb-0 text-white">Alterar País</h4>
                  </div>
                  <button type="button" class="close text-white align-right" data-dismiss="modal">&times;</button> 
              </div>
          </div>
          <div class="card-body">
              <form  name="EditarPais" action="/pais/editar" method="POST">
                @csrf 
                  <div class="form-row">
                      <div class="form-group col-xl-2">
                      <label>Codigo</label>
                      <input type="text" required class="form-control" name="id" id='alterar_id' value='' readonly>
                      </div>
                      <div class="form-group col-xl-6">
                          <label>Pais</label>
                          <input type="text" required class="form-control" name="pais" id="alterar_pais" value="">
                      </div>
                      <div class="form-group col-xl-2">
                          <label>Sigla</label>
                          <input type="text" required class="form-control" name="sigla" id='alterar_sigla' value="">
                      </div>
                      <div class="form-group col-xl-2">
                          <label>DDI</label>
                          <input type="number" required class="form-control" name="ddi" id='alterar_ddi' value="">
                      </div>
                  </div>
                  <div class="form-row" >
                    <div class="form-group col-xl-4">
                        <small>Cadastrado em:</small>
                        <input type="text" class="form-control form-control-sm" name="data_create" id='alterar_dataCadastro' value="" disabled>
                    </div>
                    <div class="form-group col-xl-4">
                        <small>Alterado em:</small>
                        <input type="text" class="form-control form-control-sm" name="data_alt" id='alterar_dataAlteracao' value="" disabled>
                    </div>
                </div>      
                       
            </div>       
            <div class="modal-footer">
                <div>
                    <!-- <a href="/pais/editar" type="button" class="btn btn-sm btn-dark delete-yes">Alterar</i></a> -->
                    <button type="submit" class="btn btn-sm btn-dark">Alterar</button> 
                   <button class="btn btn-sm btn-dark" data-dismiss="modal">Cancelar</button>
                    
                </div>
            </div>
        </form>    
        </div>
      </div>
    </div>
  </div>
  
  <script>
    $('.alterar').on('click', function(){
      var nome = $(this).data('nome'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
      var id = $(this).data('id'); // vamos buscar o valor do atributo data-id
      var sigla = $(this).data('sigla');
      var ddi = $(this).data('ddi');
      var cod = $(this).data('codigo');
      var DataCadastro = $(this).data('data_create');
      var DataAlteracao = $(this).data('data_alt');
      $("#alterar_id").val(cod); // inserir na o nome na pergunta de confirmação dentro da modal
      $("#alterar_pais").val(nome); // inserir na o nome na pergunta de confirmação dentro da modal
      $("#alterar_sigla").val(sigla); // inserir na o nome na pergunta de confirmação dentro da modal
      $("#alterar_ddi").val(ddi); // inserir na o nome na pergunta de confirmação dentro da modal
      $("#alterar_dataCadastro").val(DataCadastro); // inserir na o nome na pergunta de confirmação dentro da modal
      $("#alterar_dataAlteracao").val(DataAlteracao); // inserir na o nome na pergunta de confirmação dentro da modal
      $('#Alterar_pais').modal('show'); // modal aparece
  });
   
   
    

  </script>