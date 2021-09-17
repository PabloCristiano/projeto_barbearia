<div class="form-row">
     <div class="form-group col-xl-2">
      <label>Código</label>
      <input 
        type="number"
        id="servico_id"
        name="id"
        class="form-control "
        readonly
      >
     </div>  
     <div class="form-group required col-xl-8">
        <label>Serviço *</label>
        <input
            type="text"
            id="servico_servico"
            name="servico"
            class="form-control"
            maxlength="50"
            required
        >
    </div>
</div>

<div class="form-row">
    <div class="form-group col-xl-4">
        <label>Tempo *</label>
        <div class="input-group mb-2">
        <input 
            type="text"
            id="servico_tempo"
            name="tempo"
            class="form-control "
        >
        <div class="input-group-prepend">
          <div class="input-group-text">min</div>
        </div>
        </div> 
    </div>
    <div class="col-auto">
        <label>Valor *</label>
        <label class="sr-only" for="inlineFormInputGroup">Username</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">R$</div>
          </div>
          <input 
            type="number" 
            class="form-control" 
            placeholder=""
            id="servico_valor"
            name="valor"           
            >
        </div>
      </div>
    

    <div class="col-auto">
        <label>Comissão *</label>
        <label class="sr-only" for="inlineFormInputGroup">Username</label>
        <div class="input-group mb-2">
          <input 
             type="number" 
             class="form-control"  
             placeholder=""
             id="servico_comissao"
             name="comissao"
             class="form-control "
          >
          <div class="input-group-prepend">
            <div class="input-group-text">%</div>
          </div>
        </div>
      </div>

</div>
<div class="form-group col-xl-12 px-0">
    <label for="observacoes">Observações</label>
    <textarea name="observacoes" id="servico_observacoes" class="form-control" rows="3" disabled ></textarea>
</div>
