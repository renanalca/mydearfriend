

Create Table Cliente(
id_Cliente INT PRIMARY KEY AUTO_INCREMENT NOT NULL, 
nome VARCHAR (80) NOT NULL,
CPF VARCHAR (11) NOT NULL,
dataNascimento DATE NOT NULL, 
Telefone VARCHAR (15) NOT NULL,
Email VARCHAR (100) NOT NULL, 
Senha VARCHAR (50) NOT NULL,
statusCliente BIT NOT NULL,
linkImagem VARCHAR (300) NULL,
descricao VARCHAR (300) NULL

);

Create Table Animal(

id_Animal INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
id_Cliente INT NOT NULL,
nomeAnimal VARCHAR (50) NOT NULL,
imagemAnimal VARCHAR (500) NOT NULL, 
especieAnimal VARCHAR (50) NOT NULL,
racaAnimal VARCHAR (50) NOT NULL, 
corAnimal VARCHAR (30) NOT NULL, 
descricao VARCHAR (300) NOT NULL, 
situacao BIT NOT NULL,
idade int NULL,
estado varchar(20) NULL,
FOREIGN KEY (`id_Cliente`) REFERENCES `Cliente`(`id_Cliente`)

);
Create Table Endereco(

id_Endereco INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
id_Cliente INT NOT NULL,
cidade VARCHAR (50) NOT NULL, 
Estado VARCHAR (50) NOT NULL, 
CEP VARCHAR (8) NOT NULL,
numeroCasa INT NOT NULL,
FOREIGN KEY (`id_Cliente`) REFERENCES `Cliente`(`id_Cliente`)

);

Create Table Adocao(

id_Adocao INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
id_Cliente INT NOT NULL, 
id_Animal INT NOT NULL,
FOREIGN KEY (`id_Cliente`) REFERENCES `Cliente`(`id_Cliente`),
FOREIGN KEY (`id_Animal`) REFERENCES `Animal`(`id_Animal`)

)