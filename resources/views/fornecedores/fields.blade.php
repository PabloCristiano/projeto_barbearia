<div class="form-group">
    <label>Pessoa</label>
    <div class="form-row mx-0">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="juridica" name="tipo_pessoa" class="custom-control-input" value="juridica" required checked>
            <label class="custom-control-label" for="juridica">Jurídica</label>
        </div>

        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="fisica" name="tipo_pessoa" class="custom-control-input" value="fisica" required>
            <label class="custom-control-label" for="fisica">Física</label>
        </div>
    </div>
</div>


<div class="form-row">
    <div class="form-group col-xl-1">
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

    <div class="form-group required col-xl-6">
        <label>Razão Social *</label>
        <input
            type="text"
            id="razaoSocial"
            name="razaoSocial"
            class="form-control"
            value=""
            minlength="3"
            maxlength="50"
            required
            style="text-transform:uppercase;"
        >
    </div>

    <div class="form-group col-xl-5">
        <label>Nome Fantasia</label>
        <input
            type="text"
            id="nomefantasia"
            name="nomefantasia"
            class="form-control"
            value=""
            maxlength="50"
            style="text-transform:uppercase;"
        >
    </div>
</div>

<div class="form-row mt-4">
    <div class="form-group required col-xl-4">
        <label>Logradouro *</label>
        <input
            type="text"
            id="logradouro"
            name="logradouro"
            class="form-control "
            value=""
            maxlength="50"
            required
            style="text-transform:uppercase;"
        >
    </div>

    <div class="form-group required col-xl-2">
        <label>Número *</label>
        <input
            type="number"
            id="numero"
            name="numero"
            class="form-control"
            value=""
            min="1"
            step="1"
            oninput="validity.valid || (value = '');"
            required
            style="text-transform:uppercase;"
        >
    </div>

    <div class="form-group col-xl-2">
        <label>Complemento</label>
        <input
            type="text"
            id="complemento"
            name="complemento"
            class="form-control"
            value=""
            style="text-transform:uppercase;"
        >
    </div>

    <div class="form-group required col-xl-4">
        <label>Bairro *</label>
        <input
            type="text"
            id="bairro"
            name="bairro"
            class="form-control"
            value=""
            required
            style="text-transform:uppercase;"
        >
    </div>
</div>

<div class="form-row">
    <div class="form-group required col-xl-2">
        <label>CEP *</label>
        <input
            type="text"
            id="cep"
            name="cep"
            class="form-control"
            value=""
            placeholder="_____-___"
            required
            style="text-transform:uppercase;"
        >
    </div>

    <div class="form-group required col-xl-2">
        <label>Código *</label>

        <input
            type="number"
            class="form-control "
            name="id_cidade"
            id="id_cidade"
            data-input="#cidade"
            data-route="cidades"
            value=""
            min="1"
            step="1"
            oninput="validity.valid || (value = '');"
            required
            style="text-transform:uppercase;"
        >
    </div>

    <div class="form-group required col-xl-8">
        <label>Cidade *</label>
        <div class="input-group">
            <input
                class="form-control"
                name="cidade"
                id="cidade"
                value=""
                readonly
                style="text-transform:uppercase;"
            >

            <div class="input-group-append">
                <button
                    class="btn btn-dark btn-search"
                    type="button"
                    data-input="#cidade_id"
                    data-route="cidades"
                    data-toggle="modal"
                    data-target=".modalbuscacidade"
                >
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<div class="form-row mt-4">
    <div class="form-group col-xl-3">
        <label>WhatsApp</label>
        <input
            type="text"
            id="whatsapp"
            name="whatsapp"
            class="form-control "
            value=""
            placeholder="(__) _____-____"
            style="text-transform:uppercase;"
        >

        
    </div>

    <div class="form-group col-xl-3">
        <label>Telefone *</label>
        <input
            type="text"
            id="telefone"
            name="telefone"
            class="form-control "
            value=""
            placeholder="(__) ____-____"
            required
            style="text-transform:uppercase;"
        >

    </div>

    <div class="form-group col-xl-6">
        <label>E-mail</label>
        <input
            type="email"
            id="email"
            name="email"
            class="form-control "
            value=""
            style="text-transform:uppercase;"
        >
    </div>
</div>


<div class="form-row">
    <div class="form-group col-xl-6">
        <label>Site</label>
        <input
            type="text"
            id="pagSite"
            name="pagSite"
            class="form-control "
            value=""
            style="text-transform:uppercase;"
        >
    </div>

    <div class="form-group col-xl-6">
        <label>Contato *</label>
        <input
            type="text"
            id="contato"
            name="contato"
            class="form-control"
            value=""
            required
            style="text-transform:uppercase;"
        >
    </div>
</div>
<div class="form-row">
    <div class="form-group required col-xl-3">
        <label>CNPJ *</label>
        <input
            type="text"
            id="cpf_cnpj"
            name="cnpj"
            class="form-control "
            value=""
            maxlength="18"
            placeholder="__.___.___/____-__"
            required
            style="text-transform:uppercase;"
        >
    </div>

    <div class="form-group col-xl-3">
        <label>Inscrição Estadual</label>
        <input
            type="text"
            id="rg_inscricao_estadual"
            name="ie"
            class="form-control"
            value=""
            style="text-transform:uppercase;"
        >
    </div>
</div>

<div class="form-row">
    <div class="form-group required col-xl-2">
        <label>Código *</label>
        <input
            type="number"
            class="form-control "
            name="id_condicaopg"
            id="id_condicaopg"
            required
            style="text-transform:uppercase;"
        >
    </div>

    <div class="form-group required col-xl-7">
        <label>Condição de Pagamento *</label>
        <div class="input-group">

            <input
                type="text"
                class="form-control"
                name="condicaopg"
                id="condicaopg"
                value=""
                readonly
                style="text-transform:uppercase;"
               
            >

            <div class="input-group-append">
                <button
                    class="btn btn-dark btn-search"
                    type="button"
                    data-input="#condicao_pagamento_id"
                    data-route="condicoes-pagamento"
                    data-toggle="modal"
                    data-target="#modal-condicoes-pagamento"
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

    <div class="form-group col-xl-3">
        <label>Limite Crédito</label>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">R$</span>
            </div>

            <input
                type="number"
                id="limiteCredito"
                name="limiteCredito"
                class="form-control"
                value=""
                placeholder="0,00"
            >
        </div>
    </div>
</div>

<div class="form-group col-xl-12 px-0">
    <label for="observacoes">Observações</label>
    <textarea
    name="obs"
    id="obs"
    class="form-control "
    rows="3"
    style="text-transform:uppercase;"
     >
    </textarea>
</div>
<script>
 $(function(){
         $(".custom-control-input").click(function() {
            let id = $(this).attr("id");
    
            if (id === "fisica") {
                $("#nomefantasia").prev().text("Apelido");
    
                $("#cpf_cnpj").prev().text("CPF *");
                $("#cpf_cnpj").addClass("cpf");
                $("#cpf_cnpj").removeClass("cnpj");
    
                $("#cpf_cnpj").attr("placeholder", "___.___.___-__");
                $("#cpf_cnpj").attr("name", "cpf");
                $("#rg_inscricao_estadual").attr("name", "rg");
                $("#rg_inscricao_estadual").prev().text("RG");    
                $("#rg_inscricao_estadual").val('');
                $("#cpf_cnpj").val('');
                $('input[name="cpf"]').mask("000.000.000-00");
                $('input[name="rg"]').mask("0000.000-0");

            } else if (id === "juridica") {
                $("#nomefantasia").prev().text("Nome Fantasia");    
                $("#cpf_cnpj").prev().text("CNPJ *");
                $("#cpf_cnpj").addClass("cnpj");
                $("#cpf_cnpj").removeClass("cpf");    
                $("#cpf_cnpj").attr("placeholder", "__.___.___/____-__");
                $("#cpf_cnpj").attr("name", "cnpj");
                $("#rg_inscricao_estadual").attr("name", "ie");               
                $("#rg_inscricao_estadual").prev().text("Inscrição Estadual");    
                $("#cpf_cnpj, #rg_inscricao_estadual").val('');
                $("#rg_inscricao_estadual").val('');
                $("#cpf_cnpj").val('');
                $('input[name="cnpj"]').mask("00.000.000/0000-00");
                $('input[name="ie"]').mask("0000.000-00");
            }
           
         });   
           
           
        $("#telefone,#whatsapp").mask("(00) 00000-0000");
        $("#cep").mask("00000-000");
        $('input[name="cnpj"]').mask("00.000.000/0000-00");
        $('input[name="ie"]').mask("0000.000-00");
        $('input[name="cpf"]').mask("000.000.000-00");
        $('input[name="rg"]').mask("0000.000-0");





});
</script>

