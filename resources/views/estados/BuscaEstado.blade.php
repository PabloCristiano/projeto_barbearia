<div class="modal fade modalbuscaestado" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fa fa-list"></i>
                    <h4 class="ml-3 mb-0">Buscar Estados</h4>
                </div>
    
                <div class="float-right">
                  <!-- <a href="#" class="btn btn-dark"><i class="fa fa-plus"></i> Adicionar</a> -->
                   <button type="button" class="btn btn-dark" data-toggle="modal" data-target=".modalestado"><i class="fa fa-plus"></i> Adicionar</button>
                </div>
            </div>
            <form action="#" method="get">
              @csrf
              <div class="input-group col-md-4">
                  <input class="form-control" type="text" name="searchText" placeholder="Buscar..."  aria-label="Search" aria-describedby="basic-addon2" />
                  <div class="input-group-append">
                      <button class="btn btn-dark" type="submit"><i class="fas fa-search"></i> Buscar</button>
                  </div>
              </div>
          </form>
          
          </div>
          @include('estados.table')
          <div class="modal-footer">
            <button class="btn btn-sm btn-dark" data-dismiss="modal">Cancelar</button>
          </div>
        </div>  
    </div>
  </div>