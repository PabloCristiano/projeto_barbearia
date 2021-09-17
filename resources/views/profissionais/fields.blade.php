<div class="form-row">
    <div class="form-group col-xl-2">
        <label>Código</label>
        <input 
            type="number"
            id="id"
            name="id"
            class="form-control "
            readonly
        >
    </div>

    <div class="form-group required col-xl-6">
        <label>Profissional *</label>
        <input
            type="text"
            id="profissional"
            name="profissional"
            class="form-control"
            maxlength="50"
            required
        >
    </div>

    <div class="form-group col-xl-4">
        <label>Apelido</label>
        <input
            type="text"
            id="apelido"
            name="apelido"
            class="form-control"
            maxlength="20"
            
        >
    </div>
</div>

<div class="form-row mt-4">
    <div class="form-group required col-xl-4">
        <label>Logradouro *</label>
        <input
            type="text"
            id="endereco"
            name="endereco"
            class="form-control"
            maxlength="50"
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
            required
        >
</div>
</div>

<div class="form-row mt-4">
    <div class="form-group col-xl-4">
        <label>CEP *</label>
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
            id="idcidade"
            name="idcidade"
            class="form-control "
        >
    </div>
    <div class="form-group required col-xl-6" id="ipt-cidade">
        <label>Cidade *</label>
        <div class="input-group">
            <input
                class="form-control"
                name="cidade"
                id="cidade"
                readonly
                required
                data-error="#ipt-cidade"
            >

            <div class="input-group-append">
                <button
                    class="btn btn-dark btn-search"
                    type="button"
                    data-input="#cidade_id"
                    data-route="cidades"
                    data-toggle="modal"
                    data-target="#modal-cidades"
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
            
        >
    </div>

    <div class="form-group required col-xl-4">
        <label>Data de Nascimento </label>
        <input
            type="date"
            id="data_nascimento"
            name="data_nascimento"
            class="form-control"
            required
        >
    </div>
</div>

<div class="form-row">
    <div class="form-group col-xl-4">
        <label>Tipo Profissional *</label>
        <select class="form-control" id="tipoprofissional" name="tipoprofissinal" >
            <option></option>
            <option>Gestor</option>
            <option>Colaborador</option>
        </select>  
    </div>
    <div class="form-group col-xl-4">
        <label>Serviço *</label>
        <select class="form-control" id="tipoprofissional" name="tipoprofissinal" >
            <option></option>
            <option>Cabelo</option>
            <option>Barba</option>
            <option>Cabelo/Barba</option>
        </select>  
    </div>
    <div class="col-auto">
        <label>Comissão *</label>
        <label class="sr-only" for="inlineFormInputGroup">Username</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">%</div>
          </div>
          <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="">
        </div>
      </div>
       
       
</div>

<div class="form-group col-xl-12 px-0">
    <label for="observacoes">Observações</label>
    <textarea name="observacoes" id="observacoes" class="form-control" rows="3"></textarea>
</div>