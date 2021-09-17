<div class="form-row">
    <div class="form-group col-xl-1">
        <label>Código </label>
        <input 
            type="number"
            id="id"
            name="id"
            class="form-control "
            value=""
            readonly
        >
    </div>

    <div class="form-group required col-xl-7">
        <label>Cliente *</label>
        <input
            type="text"
            id="cliente"
            name="cliente"
            class="form-control"
            value=""
            maxlength="50"
            required
        >
    </div>

    <div class="form-group col-xl-4">
        <label>Apelido </label>
        <input
            type="text"
            id="apelido"
            name="apelido"
            class="form-control"
            maxlength="20"
            value=""
        >
    </div>
</div>

<div class="form-row mt-4">
    <div class="form-group required col-xl-4">
        <label>Logradouro</label>
        <input
            type="text"
            id="endereco"
            name="endereco"
            class="form-control"
            value=""
            maxlength="50"
            required
        >
    </div>

    <div class="form-group required col-xl-2">
        <label>Número</label>
        <input
            type="number"
            id="numero"
            name="numero"
            class="form-control"
            value=""
            max="99999"
            min="1"
            step="1"
            oninput="validity.valid || (value = '');"
            required
        >
    </div>

    <div class="form-group col-xl-2">
        <label>Complemento</label>
        <input
            type="text"
            id="complemento"
            name="complemento"
            maxlength="50"
            class="form-control"
            value=""
        >
    </div>

    <div class="form-group required col-xl-4">
        <label>Bairro</label>
        <input
            type="text"
            id="bairro"
            name="bairro"
            maxlength="50"
            class="form-control"
            value=""
            required
        >
</div>
</div>

<div class="form-row">
    <div class="form-group col-xl-2">
        <label>CEP</label>
        <input
            type="text"
            id="cep"
            name="cep"
            class="form-control"
            value=""
            placeholder="_____-___"
        >
    </div>

    <div class="form-group required col-xl-2">
        <label>Código *</label>
        <input
            type="number"
            class="form-control"
            name="cidade_id"
            id="cidade_id"
            data-input="cidade"
            data-route="cidades"
            value=""
            min="1"
            step="1"
            oninput="validity.valid || (value = '');"
            required
        >
    </div>

    <div class="form-group required col-xl-8" id="ipt-cidade">
        <label>Cidade *</label>
        <div class="input-group">
            <input
                class="form-control"
                name="cidade"
                id="cidade"
                value=""
                readonly
                required
                data-error="ipt-cidade"
            >

            <div class="input-group-append">
                <button
                    class="btn btn-dark btn-search"
                    type="button"
                    data-input="cidade_id"
                    data-route="cidades"
                    data-toggle="modal"
                    data-target="modal-cidades"
                >
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    <div id="modal-cidades" class="modal fade" data-field="cidade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header align-items-center py-2 bg-dark">
                    <h3 class="modal-title">Buscar Cidade</h3>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                   
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-row mt-4">
    <div class="form-group required col-xl-6">
        <label>WhatsApp</label>
        <input
            type="text"
            id="whatsapp"
            name="whatsapp"
            class="form-control"
            value=""
            placeholder="(__) _____-____"
            required
        >
    </div>

    <div class="form-group col-xl-6">
        <label>Telefone *</label>
        <input
            type="text"
            id="telefone"
            name="telefone"
            class="form-control "
            value=""
            placeholder="(__) ____-____"
        >
    </div>
</div>



<div class="form-row mt-4">
    <div class="form-group col-xl-4">
        <label>E-mail *</label>
        <input
            type="email"
            id="email"
            name="email"
            maxlength="50"
            class="form-control"
            value=""
        >
    </div>
    <div class="form-group col-xl-4">
        <label>Senha *</label>
        <input
            type="password"
            id="senha"
            name="senha"
            maxlength="50"
            class="form-control"
            placeholder="Digite sua senha !"
        >
    </div>
    <div class="form-group col-xl-4">
        <label>Confirme a Senha *</label>
        <input
            type="password"
            id="cfsenha"
            name="cfsenha"
            maxlength="50"
            class="form-control"
            placeholder="Confirma a sua senha !"
        >
    </div>
</div>
<div class="form-row">
    <div class="form-group required col-xl-4">
        <label>CPF *</label>
        <input
            type="text"
            id="cpf"
            name="cpf"
            class="form-control"
            value=""
            placeholder="___.___.___-__"
            required
        >
    </div>

    <div class="form-group col-xl-4">
        <label>RG</label>
        <input
            type="text"
            id="rg"
            name="rg"
            class="form-control "
            value=""
        >
    </div>

    <div class="form-group required col-xl-4">
        <label>Data de Nascimento</label>
        <input
            type="date"
            id="data_nascimento"
            name="data_nascimento"
            class="form-control"
            value=""
            required
        >
    </div>
</div>

<div class="form-row mt-4">
    <div class="form-group required col-xl-2">
        <label>Código</label>
        <input
            type="number"
            class="form-control"
            name="condicao_pagamento_id"
            id="condicao_pagamento_id"
            data-input="condicao_pagamento"
            data-route="condicoes-pagamento"
            value=""
            min="1"
            step="1"
            oninput="validity.valid || (value = '');"
            required
        >
    </div>

    <div class="form-group required col-xl-10" id="ipt-condicao-pagamento">
        <label>Condição de Pagamento</label>
        <div class="input-group">
            <input
                type="text"
                class="form-control"
                name="condicao_pagamento"
                id="condicao_pagamento"
                value=""
                readonly
                required
                data-error="ipt-condicao-pagamento"
            >

            <div class="input-group-append">
                <button
                    class="btn btn-dark btn-search"
                    type="button"
                    data-input="condicao_pagamento_id"
                    data-route="condicoes-pagamento"
                    data-toggle="modal"
                    data-target="modal-condicoes-pagamento"
                >
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    <div id="modal-condicoes-pagamento" class="modal fade" data-field="condicao_pagamento" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header align-items-center py-2 bg-dark">
                    <h3 class="modal-title">Buscar Condição de Pagamento</h3>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group col-xl-12 px-0">
    <label for="observacoes">Observações</label>
    <textarea name="observacoes" id="observacoes" class="form-control" rows="3"></textarea>
</div>