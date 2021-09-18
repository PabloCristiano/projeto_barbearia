<div class="form-row">
    <div class="form-group col-xl-1">
        <label>Código</label>
        <input type="number" id="id" name="id" class="form-control" value="" readonly />
    </div>

    <div class="form-group required col-xl-5">
        <label>Condição de Pagamento *</label>

        <input
            type="text" id="condicao_pagamento" name="condicao_pagamento" class="form-control" value="" required />
    </div>

    <div class="form-group col-xl-2">
        <label>Juros</label>

        <div class="input-group">
            <input type="number" id="juros" name="juros" class="form-control " value=""/>
            <div class="input-group-append">
                <span class="input-group-text">%</span>
            </div>
        </div>
    </div>

    <div class="form-group col-xl-2">
        <label>Multa</label>

        <div class="input-group">
            <input type="number" id="multa" name="multa" class="form-control " value="" />
            <div class="input-group-append">
                <span class="input-group-text">%</span>
            </div>
        </div>
    </div>

    <div class="form-group col-xl-2">
        <label>Desconto</label>

        <div class="input-group">
            <input type="number" id="desconto"  name="desconto" class="form-control " value="" />
            <div class="input-group-append">
                <span class="input-group-text">%</span>
            </div>
        </div>
    </div>
</div>
{{-- <div class="form-row">
    <div class="form-group col-xl-1">
        <label>Parcela</label>

        <div class="input-group">
            <input type="number" id="parcela"  name="parcela"  class="form-control " value="" readonly />
            <div class="input-group-append">
                
            </div>
        </div>
    </div>

    <div class="form-group col-xl-2">
        <label>Prazo *</label>

        <div class="input-group">
            <input type="number" id="prazo"  name="prazo"  class="form-control "  value=""  />
            <div class="input-group-append">
                
            </div>
        </div>
    </div>

    <div class="form-group col-xl-2">
        <label>Percentual *</label>

        <div class="input-group">
            <input  type="number" id="porcentagem"  name="porcentagem" class="form-control " value=""  />

            <div class="input-group-append">
                <span class="input-group-text">%</span>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-2">
        <label>Código</label>
        <input type="number"   id="idformapg"  name="idformapg" class="form-control" value=""  />
    </div>

    <div class="form-group  col-xl-5" id="ipt-pais">        
        <label>forma de Pagamento *</label>
        <div class="input-group">
           <input type="text"  class="form-control" name="formapg" id='formapg' value=""  readonly>
            <div class="input-group-append">
                <button class="btn btn-dark btn-search" type="button" data-input="#" data-route="#" data-toggle="modal" data-target=".modalformapg"> 
                    <i class="fa fa-search"></i>
                </button> 
            </div>
        </div>
    </div>
</div>
<div class="float-right">              
  <!--  <button type="button" class="btn btn-dark btnaddparcela" data-toggle="modal" data-target=".modalparcela" ><i class="fa fa-plus"></i> Adicionar Parcela</button> -->
    <input type="button"  class="btn btn-dark"  value="Adicionar Parcela" id="cadparcela" name="cadparcela" />
</div> --}}

<div class="table-wrapper mb-4">
    @include('condicaopagamento.tableParcela')
    <table id="example" class="display" width="100%"></table>    
</div>
<input
    type="text"
    id="total_parcelas"
    name="total_parcelas"
    value=""
    hidden
/>

