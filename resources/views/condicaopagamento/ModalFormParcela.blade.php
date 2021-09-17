<div id="modalparcela" class="modal fade modalparcela" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="card">
            <div class="card-header">
                <div class="modal-header align-items-center py-2 bg-dark">
                    <div class="d-flex align-items-center">
                        <h5 class="modal-titlecondicaopg" class="ml-3 mb-0 text-white" style="color: white"> Cadastrar Parcela </h5>
                    </div>
                    <button type="button" class="close text-white align-right" data-dismiss="modal">&times;</button>            
                </div>
            </div>
          <div class="card-body">
            <br>
              <form id="modalFormCondicaopg"  name="createformapg" class="needs-validation" novalidate action="#" method="POST">
                  @csrf
                  @include('condicaopagamento.fieldsParcela')                                   
                  <br>
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