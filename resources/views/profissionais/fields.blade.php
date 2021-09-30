<div class="form-row"  >
    <div class="form-group col-xl-2">
        <label>Código</label>
        <input 
            type="number"
            id="id"
            name="id"
            value="" 
            class="form-control "
            readonly
        >
    </div>

    <div class="form-group required col-xl-6 ">
        <label>Profissional *</label>
        <input
            type="text"
            id="profissional"
            name="profissional"
            class="form-control"
            maxlength="50"
            style="text-transform:uppercase;"
            required
        >
        <span  id="msgProfissional" class="text-danger"></span>
    </div>

    <div class="form-group col-xl-4">
        <label>Apelido</label>
        <input
            type="text"
            id="apelido"
            name="apelido"
            class="form-control"
            style="text-transform:uppercase;"
            maxlength="20"
            
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
            class="form-control"
            maxlength="50"
            style="text-transform:uppercase;"
            required
        >
    </div>

    <div class="form-group required col-xl-2">
        <label>Número *</label>
        <input
            type="number"
            id="numero"
            name="numero"
            class="form-control"
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
            style="text-transform:uppercase;"
        >
    </div>

    <div class="form-group required col-xl-4">
        <label>Bairro *</label>
        <input
            type="text"
            id="bairro"
            name="bairro"
            maxlength="50"
            class="form-control"
            style="text-transform:uppercase;"
            required
        >
    </div>
</div>

<div class="form-row mt-4">
    <div class="form-group col-xl-4">
        <label>CEP </label>
        <input
            type="text"
            id="cep"
            name="cep"
            class="form-control"
            placeholder="_____-___"
        >
    </div>
    <div class="form-group col-xl-2">
        <label>Código *</label>
        <input 
            type="number"
            id="id_cidade"
            name="id_cidade"
            class="form-control "
            required
        >
    </div>
    <div class="form-group  col-xl-6" id="ipt-cidade" required>
        <label>Cidade *</label>
        <div class="input-group">
            <input
                class="form-control"
                name="cidade"
                id="cidade"
                data-error="#ipt-cidade"
                style="text-transform:uppercase;"
                readonly 
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

<div class="form-row justify-content-auto">
    <div class="form-group  col-xl-4">
        <label>WhatsApp</label>
        <input
            type="text"
            id="whatsapp"
            name="whatsapp"
            class="form-control"
            placeholder="(__) _____-____"
        >
    </div>

    <div class="form-group col-xl-4">
        <label>Telefone</label>
        <input
            type="text"
            id="telefone"
            name="telefone"
            class="form-control "
            required
            placeholder="(__) ____-____"
        >
    </div>
   

</div>

<div class="form-row">
    <div class="form-group col-xl-4">
        <label>E-mail *</label>
        <input
            type="email"
            id="email"
            name="email"
            maxlength="50"
            class="form-control"
            style="text-transform:uppercase;"
            required
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
            required
        >
    </div>
    <div class="form-group col-xl-4">
        <label>Confirme a Senha *</label>
        <input
            type="password"
            id="confSenha"
            name="confSenha"
            maxlength="50"
            class="form-control"
            placeholder="Confirma a sua senha !"
            required
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
            placeholder="___.___.___-__"
            required
        >
        <span  id="msgCpf" class="text-danger"></span>
    </div>
   

    <div class="form-group col-xl-4">
        <label>RG</label>
        <input
            type="text"
            id="rg"
            name="rg"
            class="form-control "
            placeholder="__.___.___-_"
            
        >
    </div>

    <div class="form-group required col-xl-4">
        <label>Data de Nascimento </label>
        <input
            type="date"
            id="dataNasc"
            name="dataNasc"
            class="form-control"
        >
    </div>
</div>
<div class="form-row" required>
    <div class="form-group col-xl-2">
        <label>Código *</label>
        <input 
            type="number"
            id="id_servico"
            name="id_servico"
            class="form-control "
            required
        >
    </div>
    <div class="form-group  col-xl-6" id="ipt-cidade">
        <label>Serviço *</label>
        <div class="input-group">
            <input
                class="form-control"
                name="servico"
                id="servico"
                readonly
                data-error="#ipt-cidade"
                style="text-transform:uppercase;"
            >

            <div class="input-group-append">
                <button
                    class="btn btn-dark btn-search"
                    type="button"
                    data-input="#"
                    data-route="#"
                    data-toggle="modal"
                    data-target=".modalbuscaservico"
                >
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="form-group col-xl-4">
        <label>Comissão</label>
        <label class="sr-only" for="inlineFormInputGroup">Username</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">%</div>
          </div>
          <input type="text" class="form-control" name="comissao" id="comissao" placeholder="">
        </div>
      </div>

</div>
<!--
<div class="form-row">
    <div class="form-group col-xl-4">
        <label>Tipo Profissional *</label>
        <select class="form-control" id="tipoProf" name="tipoProf"  value="tipoPro">
            <option ></option>
            <option>Gestor</option>
            <option>Colaborador</option>
        </select>  
    </div>    
       
       
</div>
-->

<div class="form-group col-xl-12 px-0">
    <label for="observacoes">Observações</label>
    <textarea name="observacoes" id="observacoes" class="form-control" rows="3"  style="text-transform:uppercase;"></textarea>
</div>