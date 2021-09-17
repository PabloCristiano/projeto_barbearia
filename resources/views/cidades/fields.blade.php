<div class="form-row">
    <div class="form-group col-xl-2">
        <label>Código</label>
        <input type="number" id="cidade_id" name="id" class="form-control" value="" readonly >
    </div>

    <div class="form-group required col-xl-8">
        <label>Cidade *</label>
        <input type="text" id="cidade_cidade" name="cidade" class="form-control" value="{{ old('cidade', isset($cidade) ? $cidade->getCidade() : null) }}"  maxlength="50" minlength="03" required style="text-transform:uppercase;">
    </div>

    <div class="form-group required col-xl-2">
        <label>DDD *</label>
        <input type="text" id="cidade_ddd" name="ddd" class="form-control" value="" pattern="[0-9-]+$" required>
    </div>
</div>
<div class="form-row">
    <div class="form-group required col-xl-2">
        <label>Código *</label>
         <input type="text" class="form-control" id="cidade_estado_id" name="id_estado"  pattern="[0-9-]+$" style="text-transform:uppercase;"  required>
    </div>

    <div class="form-group required col-xl-10" >
        <label>Estado *</label>
        <div class="input-group">
           <input type="text" class="form-control" id="cidade_estado" name="estado" readonly>
            <div class="input-group-append">
                <button class="btn btn-dark btn-search" type="button" data-input="#" data-route="#" data-toggle="modal" data-target=".modalbuscaestado"> 
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</div>
