<div class="form-row">
    <div class="form-group col-xl-1">
        <label>Parc *</label>
        <input type="number" id="id" name="id" class="form-control" value="" />
    </div>

    <div class="form-group col-xl-1">
        <label>Cod *</label>
        <input type="number" id="id" name="id" class="form-control" value="" />
    </div>

    <div class="form-group required col-xl-6" id="ipt-pais">        
        <label>forma de Pagamento *</label>
        <div class="input-group">
           <input type="text" required class="form-control" name="pais" id='alterar_pais' value=""  readonly>
            <div class="input-group-append">
                <button class="btn btn-dark btn-search" type="button" data-input="#" data-route="#" data-toggle="modal" data-target=".modalformapg"> 
                    <i class="fa fa-search"></i>
                </button> 
            </div>
        </div>
    </div>
    <div class="form-group col-xl-2">
        <label>Prazo</label>
        <div class="input-group">
            <input
                type="number"
                id="juros"
                name="juros"
                class="form-control "
                value=""
            />
        </div>
    </div>

    <div class="form-group col-xl-2">
        <label>Percentual</label>
        <div class="input-group">
            <input
                type="number"
                id="multa"
                name="multa"
                class="form-control "
                value=""
            />
            <div class="input-group-append">
                <span class="input-group-text">%</span>
            </div>
        </div>
    </div>
</div>