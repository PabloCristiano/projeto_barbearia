<div class="form-row">
    <div class="form-group col-xl-2">
        <label>Código</label>
        <input
            type="number"
            id="id"
            name="id"
            class="form-control "
            value=""
            readonly
        >

        
    </div>

    <div class="form-group required col-xl-8">
        <label>Produto *</label>
        <input
            type="text"
            id="produto"
            name="produto"
            class="form-control "
            value=""
            maxlength="50"
            required
        >

       
    </div>

    <div class="form-group required col-xl-2">
        <label>Unidade *</label>
        <input
            type="text"
            id="unidade"
            name="unidade"
            class="form-control"
            value=""
            placeholder="UN"
            maxlength="10"
            required
        >

        
    </div>
</div>

<div class="form-row">
    <div class="form-group required col-xl-2">
        <label>Código *</label>
        <input
            type="number"
            class="form-control "
            name="categoria_id"
            id="categoria_id"
            data-input="#categoria"
            data-route="categorias"
            value=""
            min="1"
            step="1"
            oninput="validity.valid || (value = '');"
            required
        >

        
    </div>

    <div class="form-group required col-xl-10">
        <label>Categoria *</label>
        <div class="input-group">
            <input
                class="form-control"
                name="categoria"
                id="categoria"
                value=""
                readonly
                required
            >

            <div class="input-group-append">
                <button
                    class="btn btn-dark btn-search"
                    type="button"
                    data-input="#categoria_id"
                    data-route="categorias"
                    data-toggle="modal"
                    data-target="#modal-categorias"
                >
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    <div id="modal-categorias" class="modal fade" data-field="categoria" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header align-items-center py-2 bg-dark">
                    <h3 class="modal-title">Buscar Categoria</h3>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group required col-xl-2">
        <label>Código *</label>
        <input
            type="number"
            class="form-control "
            name="categoria_id"
            id="categoria_id"
            data-input="#categoria"
            data-route="categorias"
            value=""
            min="1"
            step="1"
            oninput="validity.valid || (value = '');"
            required
        >

        
    </div>

    <div class="form-group required col-xl-10">
        <label>Fornecedor *</label>
        <div class="input-group">
            <input
                class="form-control"
                name="fornecedor"
                id="fornecedor"
                value=""
                readonly
                required
            >

            <div class="input-group-append">
                <button
                    class="btn btn-dark btn-search"
                    type="button"
                    data-input="#fornecedor_id"
                    data-route="fornecedor"
                    data-toggle="modal"
                    data-target="#modal-fornecedores"
                >
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    <div id="modal-fornecedores" class="modal fade" data-field="fornecedor" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header align-items-center py-2 bg-dark">
                    <h3 class="modal-title">Buscar Fornecedores</h3>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-xl-2">
        <label>Estoque</label>
        <input
            type="number"
            id="estoque"
            name="estoque"
            class="form-control "
            value=""
            readonly
        >

        
    </div>

    <div class="form-group col-xl-3">
        <label>Preço de Custo</label>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>

            <input
                type="number"
                id="preco_custo"
                name="preco_custo"
                class="form-control"
                value=""
                placeholder="0,00"
                readonly
            >

           
        </div>
    </div>

    <div class="form-group required col-xl-3">
        <label>Preço de Venda *</label>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>

            <input
                type="number"
                id="preco_venda"
                name="preco_venda"
                class="form-control"
                value=""
                placeholder="0,00"
                step=".01"
                oninput="validity.valid || (value = '');"
                required
            >

           
        </div>
    </div>

    <div class="form-group col-xl-4">
        <label>Custo Últ. Compra</label>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>

            <input
                type="number"
                id="custo_ultima_compra"
                name="custo_ultima_compra"
                class="form-control"
                value=""
                placeholder="0,00"
                readonly
            >

            
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-xl-4">
        <label>Data Últ. Compra</label>
        <input
            type="date"
            id="data_ultima_compra"
            name="data_ultima_compra"
            class="form-control "
            value=""
            readonly
        >

        
    </div>

    <div class="form-group col-xl-4">
        <label>Data Últ. Venda</label>
        <input
            type="date"
            id="data_ultima_venda"
            name="data_ultima_venda"
            class="form-control "
            value=""
            readonly
        >

        
    </div>
</div>
