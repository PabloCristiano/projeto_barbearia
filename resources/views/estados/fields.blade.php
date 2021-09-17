<div class="form-row">
    <div class="form-group col-xl-2">
        <label>Código</label>
        <input type="text" required class="form-control" name="id" id='alterar_id' value=''  readonly >
    </div>

    <div class="form-group required col-xl-8">
        <label>Estado *</label>
        <input type="text" required class="form-control" name="estado" id="alterar_estado" value="" required>
    </div>

    <div class="form-group required col-xl-2">
        <label>UF *</label>
        <input type="text" id="alterar_uf" name="uf" class="form-control" value="" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group required col-xl-2">
        <label>Código *</label>
         <input type="text" required class="form-control" name="id_pais" id='alterar_idpais' value='' required>
    </div>

    <div class="form-group required col-xl-10" id="ipt-pais">
        <label>País *</label>
        <div class="input-group">
           <input type="text" required class="form-control" name="pais" id='alterar_pais' value=""  required>
            <div class="input-group-append">
                <button class="btn btn-dark btn-search" type="button" data-input="#" data-route="#" data-toggle="modal" data-target=".modalbuscapais"> 
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    
</script>
