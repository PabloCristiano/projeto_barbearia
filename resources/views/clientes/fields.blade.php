<div class="form-row">
    <div class="form-group col-xl-2">
        <label>Código </label>
        <input type="number" id="id" name="id" class="form-control " value="" readonly>

    </div>

    <div id="cliente_cliente" class="form-group  col-xl-7">
        <label>Cliente *</label>
        <input type="text" id="cliente" name="cliente" class="form-control" value="" minlength="3"
            maxlength="50" style="text-transform:uppercase;" required>
        <span  id="msgCliente" class="text-danger"></span>
    </div>

    <div class="form-group col-xl-3">
        <label>Apelido </label>
        <input type="text" id="apelido" name="apelido" class="form-control" minlength="3" maxlength="20"
            value="" style="text-transform:uppercase;">
    </div>
</div>

<div id="cliente_logradouro" class="form-row mt-4">
    <div class="form-group required col-xl-4">
        <label>Logradouro *</label>
        <input type="text" id="logradouro" name="logradouro" class="form-control" value="" maxlength="50"
            style="text-transform:uppercase;" required>
    </div>

    <div id="cliente_numero" class="form-group  col-xl-2">
        <label>Número *</label>
        <input type="number" id="numero" name="numero" class="form-control" value="" max="99999" min="1" step="1"
            style="text-transform:uppercase;">
    </div>

    <div class="form-group col-xl-2">
        <label>Complemento</label>
        <input type="text" id="complemento" name="complemento" maxlength="50" minlength="4" class="form-control"
            value="" style="text-transform:uppercase;">
    </div>

    <div id="cliente_bairro" class="form-group  col-xl-4">
        <label>Bairro *</label>
        <input type="text" id="bairro" name="bairro" maxlength="50" class="form-control" value=""
            style="text-transform:uppercase;">
    </div>
</div>

<div class="form-row">
    <div class="form-group col-xl-2">
        <label>CEP</label>
        <input type="text" id="cep" name="cep" class="form-control" value="" placeholder="_____-___"
            style="text-transform:uppercase;">
    </div>

    <div id="cliente_id_cidade" class="form-group  col-xl-2">
        <label>Código *</label>
        <input type="number" class="form-control" name="id_cidade" id="id_cidade" data-input="cidade"
            data-route="" value="" min="1" step="1" style="text-transform:uppercase;" required>
    </div>

    <div id="cliente_cidade" class="form-group required col-xl-8" id="ipt-cidade">
        <label>Cidade </label>
        <div class="input-group">
            <input class="form-control" name="cidade" id="cidade" value="" readonly
                style="text-transform:uppercase;">

            <div class="input-group-append">
                <button class="btn btn-dark btn-search" type="button" data-input="cidade_id" data-route=""
                    data-toggle="modal" data-target=".modalbuscacidade">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>


</div>

<div class="form-row mt-4">
    <div class="form-group required col-xl-6">
        <label>WhatsApp</label>
        <input type="text" id="whatsapp" name="whatsapp" class="form-control" value=""
            placeholder="(__) _____-____">
    </div>

    <div id="cliente_telefone" class="form-group col-xl-6">
        <label>Telefone *</label>
        <input type="text" id="telefone" name="telefone" class="form-control " value=""
            placeholder="(__) ____-____" required>
    </div>
</div>



<div id="cliente_email" class="form-row mt-4">
    <div class="form-group col-xl-4">
        <label>E-mail *</label>
        <input type="email" id="email" name="email" maxlength="50" class="form-control" value=""
            style="text-transform:uppercase;">
    </div>
    <div id="cliente_senha" class="form-group col-xl-4">
        <label>Senha *</label>
        <input type="password" id="senha" name="senha" maxlength="50" class="form-control" value=""
            placeholder="Digite sua senha !" required>
    </div>
    <div id="cliente_confSenha" class="form-group col-xl-4">
        <label>Confirme a Senha *</label>
        <input type="password" id="confSenha" name="confSenha" maxlength="50" class="form-control" value=""
            placeholder="Confirma a sua senha !" required>
    </div>
</div>
<div class="form-row">
    <div id="clienteCpf" class="form-group required col-xl-4">
        <label>CPF *</label>
        <input type="text" id="cpf" name="cpf" class="form-control" value="" placeholder="___.___.___-__" required>
        <span  id="msgCpf" class="text-danger"></span>
    </div>

    <div id="clienteRg" class="form-group col-xl-4">
        <label>RG</label>
        <input type="text" id="rg" name="rg" class="form-control " value="" maxlength="10">
    </div>

    <div id="cliente_datanascimento" class="form-group  col-xl-4">
        <label>Data de Nascimento</label>
        <input type="date" id="dataNasc" name="dataNasc" class="form-control" value="">
    </div>
</div>

<div id="cliente_id_condicao" class="form-row mt-4">
    <div class="form-group col-xl-2">
        <label>Código *</label>
        <input type="number" class="form-control" name="id_condicao" id="id_condicao" data-input="condicao_pagamento"
            data-route="condicoes-pagamento" value="" min="1" step="1" oninput="" required >
    </div>

    <div class="form-group required col-xl-10" id="ipt-condicao-pagamento">
        <label>Condição de Pagamento *</label>
        <div class="input-group">
            <input type="text" class="form-control" name="condicao" id="condicao" value="" readonly
                style="text-transform:uppercase;" data-error="ipt-condicao-pagamento">

            <div class="input-group-append">
                <button class="btn btn-dark btn-search" type="button" data-input="condicao_pagamento_id"
                    data-route="condicoes-pagamento" data-toggle="modal" data-target=".modalShowCondicao">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    <input type="text" name="destroy" id="destroy" value="" hidden>

</div>
{{-- <div class="form-group col-xl-12 px-0">
    <label for="observacoes">Observações</label>
    <textarea name="observacao" id="observacao" class="form-control" rows="3"
        style="text-transform:uppercase;"></textarea>
</div> --}}
