<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="Excluir_pais">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="card">
        <div class="card-header">
          <div class="modal-header align-items-center py-2 bg-dark" >
                <div class="d-flex align-items-center">
                    <h4 class="ml-3 mb-0 text-white">Excluir País</h4>
                </div>
                <button type="button" class="close text-white align-right" data-dismiss="modal">&times;</button> 
            </div>
        </div>
        <div class="card-body">
            <form > 
                <div class="form-row">
                    <div class="form-group col-xl-2">
                    <label>Codigo</label>
                    <input type="text" required class="form-control" name='excluir_id' id='excluir_id' value=''  readonly>
                    </div>
                    <div class="form-group col-xl-6">
                        <label>Pais</label>
                        <input type="text" required class="form-control" name="excluir_pais" id="excluir_pais" value=""  readonly>
                    </div>
                    <div class="form-group col-xl-2">
                        <label>Sigla</label>
                        <input type="text" required class="form-control" name='excluir_sigla' id='excluir_sigla' value='' readonly >
                    </div>
                    <div class="form-group col-xl-2">
                        <label>DDI</label>
                        <input type="text" required class="form-control" name='excluir_ddi' id='excluir_ddi' value='' readonly >
                    </div>
                </div>
                <div class="form-row" >
                  <div class="form-group col-xl-4">
                      <small>Cadastrado em:</small>
                      <input type="text" class="form-control form-control-sm" name='excluir_dataCadastro' id='excluir_dataCadastro' value="" disabled>
                  </div>
                  <div class="form-group col-xl-4">
                      <small>Alterado em:</small>
                      <input type="text" class="form-control form-control-sm" name='excluir_dataAlteracao' id='excluir_dataAlteracao' value="" disabled>
                  </div>
              </div>    
            </form>         
          </div>        
          <div class="modal-footer">
            <a href="" type="button" class="btn btn-sm btn-dark delete-yes">Excluir</i></a>
            <button class="btn btn-sm btn-dark" data-dismiss="modal">Cancelar</button>
          </div>  
      </div>
    </div>
  </div>
</div>

<script>
  $('.delete').on('click', function(){
    var nome = $(this).data('nome'); // vamos buscar o valor do atributo data-name que temos no botão que foi clicado
    var id = $(this).data('id'); // vamos buscar o valor do atributo data-id
    var sigla = $(this).data('sigla');
    var ddi = $(this).data('ddi');
    var cod = $(this).data('codigo');
    var DataCadastro = $(this).data('data_create');
    var DataAlteracao = $(this).data('data_alt');
    $("#excluir_id").val(cod); // inserir na o nome na pergunta de confirmação dentro da modal
    $("#excluir_pais").val(nome); // inserir na o nome na pergunta de confirmação dentro da modal
    $("#excluir_sigla").val(sigla); // inserir na o nome na pergunta de confirmação dentro da modal
    $("#excluir_ddi").val(ddi); // inserir na o nome na pergunta de confirmação dentro da modal
    $("#excluir_dataCadastro").val(DataCadastro); // inserir na o nome na pergunta de confirmação dentro da modal
    $("#excluir_dataAlteracao").val(DataAlteracao); // inserir na o nome na pergunta de confirmação dentro da modal
    $('a.delete-yes').attr('href', '/pais/apagar/' +id); // mudar dinamicamente o link, href do botão confirmar da modal
    $('#Excluir_pais').modal('show'); // modal aparece
});
</script>