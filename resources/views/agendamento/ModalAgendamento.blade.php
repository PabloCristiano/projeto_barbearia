<div class="modal fade modalagendamento" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modalPesonalizado">
        <div class="modal-content">
          <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <i class="fa fa-list"></i>
                    <h3 class="ml-3 mb-0"> Agendamento </h3>
                </div>
            </div>
         </div>
         
         <div class="table-responsive">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-xl-6">
                        <h5 id="hoje"><h5>
                    </div>
                    <div class="form-group  col-xl-6" id="ipt-cidade" required>
                        <div class="input-group">
                            <input type="date"class="form-control" name="datadata" id="datadata">
    
                            <div class="input-group-append">
                                <button class="btn btn-dark btn-search" type="button" data-input="#cidade_id"
                                    data-route="cidades" data-toggle="modal" data-target=".modalbuscacidade">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                   
                
                <table id="tableagenda" class="table" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th class='text-center' scope="col"></th>
                        <th class='text-center' scope="col"></th>
                        <th class='text-center' scope="col"></th>
                        <th class='text-center' scope="col"></th>
                        <th class='text-center' scope="col"></th>
                        <th class='text-center' scope="col"></th>
                    </tr>
                </thead>
                <tbody>                
                    <tr >
                        
                            <td class='text-center table-success' >08:00 <input id="day" name='check' data-day='' data-hora='08:00' value='08:00' type='radio'  ></td>
                            <td class='text-center table-success' >08:30 <input id="day" name='check' data-day='' data-hora='08:30' value='08:30' type='radio'  ></td>
                            <td class='text-center table-success' >09:00 <input id="day" name='check' data-day='' data-hora='09:00' value='09:00' type='radio'  ></td>
                            <td class='text-center table-success' >09:30 <input id="day" name='check' data-day='' data-hora='09:30' value='09:30' type='radio'  ></td>
                            <td class='text-center table-success' >10:00 <input id="day" name='check' data-day='' data-hora='10:00' value='10:00' type='radio'  ></td>
                            <td class='text-center table-success' >10:30 <input id="day" name='check' data-day='' data-hora='10:30' value='10:30' type='radio'  ></td>
                                             
                    </tr>                      
                    <tr >
                        
                            <td class='text-center table-success' >11:00 <input id="day" name='check' data-day='' data-hora='11:00' value='11:00' type='radio'  ></td>
                            <td class='text-center table-success' >11:30 <input id="day" name='check' data-day='' data-hora='11:30' value='11:30' type='radio'  ></td>
                            <td class='text-center table-success' >12:00 <input id="day" name='check' data-day='' data-hora='12:00' value='12:00' type='radio'  ></td>
                            <td class='text-center table-success' >12:30 <input id="day" name='check' data-day='' data-hora='12:30' value='12:30' type='radio'  ></td>
                            <td class='text-center table-success' >13:00 <input id="day" name='check' data-day='' data-hora='13:00' value='13:00' type='radio' ></td>
                            <td class='text-center table-success' >13:30 <input id="day" name='check' data-day='' data-hora='13:30' value='13:30' type='radio'  ></td>
                                             
                    </tr>                      
                    <tr >
                        
                            <td class='text-center table-success' >14:00 <input id="day" name='check' data-day='' data-hora='14:00' value='14:00' type='radio'  ></td>
                            <td class='text-center table-success' >14:30 <input id="day" name='check' data-day='' data-hora='14:30' value='14:30' type='radio'  ></td>
                            <td class='text-center table-success' >15:00 <input id="day" name='check' data-day='' data-hora='15:00' value='15:00' type='radio'  ></td>
                            <td class='text-center table-success' >15:30 <input id="day" name='check' data-day='' data-hora='15:30' value='15:30' type='radio'  ></td>
                            <td class='text-center table-success' >16:00 <input id="day" name='check' data-day='' data-hora='16:00' value='16:00' type='radio'  ></td>
                            <td class='text-center table-success' >16:30 <input id="day" name='check' data-day='' data-hora='16:30' value='16:30' type='radio'  ></td>
                                             
                    </tr>                      
                    <tr >
                        
                            <td class='text-center table-success' id='td18'>17:00 <input id="day" name='check' data-day='' data-hora='17:00' value='17:00' type='radio'  ></td>
                            <td class='text-center table-success' id='td19'>17:30 <input id="day" name='check' data-day='' data-hora='17:30' value='17:30' type='radio'  ></td>
                            <td class='text-center table-success' id='td20'>18:00 <input id="day" name='check' data-day='' data-hora='18:00' value='18:00' type='radio'  ></td>
                            <td class='text-center table-success'id='td21'>18:30 <input  id="day" name='check' data-day='' data-hora='18:30' value='18:30' type='radio'  ></td>
                            <td class='text-center table-success'id='td22'>19:00 <input  id="day" name='check' data-day='' data-hora='19:00' value='19:00' type='radio'  ></td>
                            <td class='text-center table-success'id='td23'>19:30 <input  id="day" name='check' data-day='' data-hora='19:30' value='19:30' type='radio'  ></td>
                                             
                    </tr>                      
                </tbody>
        
                <tfoot class="thead-dark">
                    <tr>
                        <th class='text-center' scope="col"></th>
                        <th class='text-center' scope="col"></th>
                        <th class='text-center' scope="col"></th>
                        <th class='text-center' scope="col"></th>
                        <th class='text-center' scope="col"></th>
                        <th class='text-center' scope="col"></th>
                    </tr>
                </tfoot>
            </table>
            </div> 
            <div class="modal-footer">
              <button class="btn btn-sm btn-dark" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
        </div>  
    </div>
</div>
@include('agendamento.scriptAgenda')