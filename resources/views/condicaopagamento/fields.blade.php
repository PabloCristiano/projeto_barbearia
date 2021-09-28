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


