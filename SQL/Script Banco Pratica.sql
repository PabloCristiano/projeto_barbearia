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
    apelido  varchar(50) NOT NULL,
    cpf      varchar(14) NOT NULL,
<<<<<<< HEAD
    rg       varchar(8),
    dataNasc date,
    logradouro varchar(50),
    numero varchar(10),
=======
    rg       varchar(8) NOT NULL,
    dataNasc date,
    logradouro varchar(50),
    numero varchar(10)
>>>>>>> 736bb61fd65cccf7daa6ee8b9d5a4b368a2b863b
    complemento varchar(50),
    bairro varchar(50),
    cep varchar(9),
    id_cidade int NOT NULL,
    whatsapp varchar(14),
    telefone varchar(14) NOT NULL,
    email varchar(50) NOT NULL,
    senha varchar(50) NOT NULL,
    confSenha varchar(50) NOT NULL,
    observação varchar(255),
    data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
<<<<<<< HEAD
    FOREIGN KEY (id_cidade) REFERENCES Cidades (id)
=======
    FOREIGN KEY (id_cidade) references Cidades (id)
>>>>>>> 736bb61fd65cccf7daa6ee8b9d5a4b368a2b863b
)DEFAULT CHARSET = utf8;

create table Servicos(
    id int not null auto_increment,
    servico   varchar(50) NOT NULL,
    tempo  int NOT NULL,
    valor  float NOT NULL,
<<<<<<< HEAD
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
    unidade   varchar(50) NOT NULL,
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
   cpf      varchar(14) NOT NULL,
   rg       varchar(8),
   dataNasc date NOT NULL,
   logradouro varchar(50) NOT NULL,
   numero     varchar(10) NOT NULL,
   complemento varchar(50),
   bairro      varchar(50) NOT NULL,
   cep varchar(9) NOT NULL,
   id_cidade int NOT NULL,
   whatsapp varchar(14),
   telefone varchar(14) NOT NULL,
   email varchar(50) NOT NULL,
   senha varchar(50) NOT NULL,
   confSenha varchar(50) NOT NULL,
   tipoProf varchar(50) NOT NULL,
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
   cnpj    varchar(18) NOT NULL,
   ie   varchar(14),
   cpf      varchar(14) NOT NULL,
   rg       varchar(8),
   id_condiçãopg int NOT NULL,
   limeteCredito float,
   obs varchar(255),
   data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (id),
   FOREIGN KEY (id_cidade) REFERENCES Cidades (id)
=======
    data_create  TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    data_alt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
>>>>>>> 736bb61fd65cccf7daa6ee8b9d5a4b368a2b863b
)DEFAULT CHARSET = utf8;



<<<<<<< HEAD



=======
>>>>>>> 736bb61fd65cccf7daa6ee8b9d5a4b368a2b863b
