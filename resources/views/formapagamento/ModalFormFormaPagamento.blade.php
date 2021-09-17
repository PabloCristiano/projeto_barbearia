<div id="modalformapg" class="modal fade modalformapg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="card">
            <div class="card-header">
                <div class="modal-header align-items-center py-2 bg-dark">
                    <div class="d-flex align-items-center">
                        <h5 class="modal-titleformapg" class="ml-3 mb-0 text-white" style="color: white"> Cadastrar Forma de Pagamento </h5>
                    </div>
                    <button type="button" class="close text-white align-right" data-dismiss="modal">&times;</button>            
                </div>
            </div>
          <div class="card-body">
              <form id="modalFormFormapg"  name="createformapg" class="needs-validation" novalidate action="/formapagamento" method="POST">
                  @csrf
                  @include('formapagamento.fields')
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
                  <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-dark btn-sm btnformapg">SALVAR</button>
                        <button class="btn btn-sm btn-dark" data-dismiss="modal">VOLTAR</button>
                    </div>
                </div>
              </form>   
          </div>
      </div>
    </div>
  </div>
</div>