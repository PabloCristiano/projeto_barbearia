create table Paises(
    id int not null auto_increment,
    pais   varchar(50) NOT NULL,
    sigla  varchar(6) NOT NULL,
    ddi    varchar(6) NOT NULL,
    data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)DEFAULT CHARSET = utf8;


create table Estados(
    id int not null auto_increment,
    estado   varchar(50) NOT NULL,
    uf  varchar(6) NOT NULL,
    id_pais int NOT NULL,
    data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (id_pais) references Paises (id)
)DEFAULT CHARSET = utf8;


create table Cidades(
    id int not null auto_increment,
    cidade   varchar(50) NOT NULL,
    ddd  varchar(6) NOT NULL,
    id_estado int NOT NULL,
    data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (id_estado) references Estados (id)
)DEFAULT CHARSET = utf8;

create table Clientes(
    id int not null auto_increment,
    cliente   varchar(50) NOT NULL,
    apelido  varchar(50),
    cpf      varchar(14) NOT NULL,
    rg       varchar(8),
    dataNasc date,
    logradouro varchar(50),
    numero varchar(10),
    complemento varchar(50),
    bairro varchar(50),
    cep varchar(9),
    id_cidade int NOT NULL,
    id_condicao int NOT NULL,
    whatsapp varchar(14),
    telefone varchar(14) NOT NULL,
    email varchar(50) NOT NULL,
    senha varchar(50) NOT NULL,
    confSenha varchar(50) NOT NULL,
    observacao varchar(255),
    data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (id_cidade) REFERENCES Cidades (id),
    FOREIGN KEY (id_condicao) REFERENCES condicao_pg (id)
)DEFAULT CHARSET = utf8;

create table Servicos(
    id int not null auto_increment,
    servico   varchar(50) NOT NULL,
    tempo  int NOT NULL,
    valor  float NOT NULL,
    comissao float NOT NULL, 
    data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)DEFAULT CHARSET = utf8;

create table Categorias(
    id int not null auto_increment,
    categoria   varchar(50) NOT NULL, 
    data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)DEFAULT CHARSET = utf8;



create table Produtos(
    id int not null auto_increment,
    produto   varchar(50) NOT NULL,
    unidade   int NOT NULL,
    id_categoria int NOT NULL,
    id_fornecedor int NOT NULL,
    qtdEstoque int,
    precoCusto float,
    precoVenda float NOT NULL,
    custoUltCompra float,
    dataUltCompra date,
    dataUltVenda date,
    data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (id_categoria) REFERENCES Categorias (id),
    FOREIGN KEY (id_fornecedor) REFERENCES Fornecedores (id)
)DEFAULT CHARSET = utf8;


create table Profissionais(
   id int not null auto_increment,
   profissional varchar(50) NOT NULL,
   apelido  varchar(50),
   cpf      varchar(18) NOT NULL,
   rg       varchar(18),
   dataNasc date NOT NULL,
   logradouro varchar(50) NOT NULL,
   numero     varchar(10) NOT NULL,
   complemento varchar(50),
   bairro      varchar(50) NOT NULL,
   cep varchar(12) NOT NULL,
   id_cidade int NOT NULL,
   whatsapp varchar(20),
   telefone varchar(20) NOT NULL,
   email varchar(50) NOT NULL,
   senha varchar(50) NOT NULL,
   confSenha varchar(50) NOT NULL,
   id_servico int NOT NULL,
   comissao float NOT NULL,
   data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (id),
   FOREIGN KEY (id_cidade) REFERENCES Cidades (id),
   FOREIGN KEY (id_servico) REFERENCES Servicos (id)
)DEFAULT CHARSET = utf8;



create table Fornecedores(
   id int not null auto_increment,
   tipo_pessoa varchar(50),
   razaoSocial varchar(50) NOT NULL,
   nomeFantasia varchar(50),
   apelido varchar(50),
   logradouro varchar(50) NOT NULL,
   numero varchar(10) NOT NULL,
   complemento varchar(50),
   bairro varchar(50) NOT NULL,
   cep varchar(9) NOT NULL,
   id_cidade int NOT NULL,
   whatsapp varchar(14),
   telefone varchar(14),
   email varchar(50),
   pagSite varchar(50),
   contato varchar(50),
   cnpj    varchar(18) NOT NULL,
   ie   varchar(14),
   cpf      varchar(14) NOT NULL,
   rg       varchar(10),
   id_condicaopg int NOT NULL,
   limeteCredito float,
   obs varchar(255),
   data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (id),
   FOREIGN KEY (id_cidade) REFERENCES Cidades (id)
)DEFAULT CHARSET = utf8;

create table forma_pg(
    id int not null auto_increment,
    forma_pg   varchar(50) NOT NULL,
    data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)DEFAULT CHARSET = utf8;

create table condicao_pg(
    id int not null auto_increment,
    condicao_pg   varchar(50) NOT NULL,
    juros      double NOT NULL,
    multa      double NOT NULL,
    desconto   double NOT NULL,
    data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
)DEFAULT CHARSET = utf8;

create table parcelas_condicao_pg(
    numeroparc int NOT NULL,
    dias       int NOT NULL,
    porcentagem double NOT NULL,
    id_formapg int NOT NULL,
    id_condpg  int NOT NULL,
    data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT FK_idCondPagParc FOREIGN KEY (id_condpg) REFERENCES condicao_pg (id),
    CONSTRAINT FK_idFormaPagParc FOREIGN KEY (id_formapg) REFERENCES forma_pg (id),
    PRIMARY KEY(id_condpg,numeroparc)
)DEFAULT CHARSET = utf8;

create table parcela(
    parcela int NOT NULL,
    prazo       int NOT NULL,
    porcentagem double NOT NULL,
    idformapg int NOT NULL,
    idcondpg  int NOT NULL,
    data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT FK_idCondParc FOREIGN KEY (idcondpg) REFERENCES condicao_pg (id),
    CONSTRAINT FK_idFormaParc FOREIGN KEY (idformapg) REFERENCES forma_pg (id),
    PRIMARY KEY(idcondpg,parcela)
)DEFAULT CHARSET = utf8;

create table agendamento(
    id int not null auto_increment,
    id_cliente  int NOT NULL,
    id_profissional  int NOT NULL,
    id_servi??o      int NOT NULL,
    horario   varchar(50) NOT NULL,
    data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
   FOREIGN KEY (id_cliente) REFERENCES Clientes (id),
   FOREIGN KEY (id_profissional) REFERENCES Profissionais (id)
)DEFAULT CHARSET = utf8;







