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
            minlength="4"
            style="text-transform:uppercase;"
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
            style="text-transform:uppercase;"
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
            name="id_categoria"
            id="id_categoria"
            value=""
            style="text-transform:uppercase;"
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
                style="text-transform:uppercase;"
            >

            <div class="input-group-append">
                <button
                    class="btn btn-dark btn-search"
                    type="button"
                    data-input="#categoria_id"
                    data-route="categorias"
                    data-toggle="modal"
                    data-target=".modalbuscacategoria"
                    
                >
                    <i class="fa fa-search"></i>
                </button>
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
            name="id_fornecedor"
            id="id_fornecedor"
            value=""
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
                style="text-transform:uppercase;"
            >

            <div class="input-group-append">
                <button
                    class="btn btn-dark btn-search"
                    type="button"
                    data-input="#fornecedor_id"
                    data-route="fornecedor"
                    data-toggle="modal"
                    data-target=".modalbuscafornecedores"
                >
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-xl-2">
        <label>Estoque</label>
        <input
            type="number"
            id="qtdEstoque"
            name="qtdEstoque"
            class="form-control "
            value=""
            readonly
        >

        
    </div>

    <div class="form-group col-xl-3">
        <label>Preço de Custo *</label>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>

            <input
                type="number"
                id="precoCusto"
                name="precoCusto"
                class="form-control"
                value=""
                placeholder="0,00"
                required
                
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
                id="precoVenda"
                name="precoVenda"
                class="form-control"
                value=""
                placeholder="0,00"
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
                id="custoUltCompra"
                name="custoUltCompra"
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
            id="dataUltCompra"
            name="dataUltCompra"
            class="form-control "
            value=""
            readonly
        >

        
    </div>

    <div class="form-group col-xl-4">
        <label>Data Últ. Venda</label>
        <input
            type="date"
            id="dataUltVenda"
            name="dataUltVenda"
            class="form-control "
            value=""
            readonly
        >

        
    </div>
</div>
