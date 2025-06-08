📚 Biblioteca Virtual
Sistema web para cadastro e gerenciamento de livros, autores e gêneros literários, desenvolvido como exercício de aplicação de conceitos de orientação a objetos em PHP puro.

🧪 Ambiente de Desenvolvimento
Sistema operacional: Windows

Servidor local: XAMPP

PHP: Versão 8.2

MySQL/MariaDB: Versão compatível com XAMPP

Editor: VS Code

🛠️ Tecnologias Utilizadas
Linguagem: PHP puro (com orientação a objetos)

Banco de dados: MySQL

Estilo e layout: HTML5 + CSS3 (com Bootstrap 5)

JavaScript: Vanilla JS para interações (cadastro, edição, exclusão via eventos e manipulação de DOM)

🚀 Instalação e Execução
Instale o XAMPP e inicie os serviços Apache e MySQL.

Copie a pasta do projeto para o diretório htdocs do XAMPP:

swift
Copiar
Editar
C:/xampp/htdocs/Biblioteca-virtual/
Crie um banco de dados chamado biblioteca no phpMyAdmin.

Importe o script SQL biblioteca_com_cascade.sql (ou equivalente) para criar as tabelas.

Acesse a aplicação via navegador:

bash
Copiar
Editar
http://localhost/Biblioteca-virtual/index.php
💻 Requisitos de Sistema
PHP 8+ com suporte a PDO

MySQL/MariaDB

Navegador moderno (Chrome, Firefox, Edge)

XAMPP ou outro ambiente de desenvolvimento com Apache + MySQL

🤝 Como Contribuir
Fork este repositório

Crie uma nova branch:

bash
Copiar
Editar
git checkout -b minha-feature
Faça suas alterações

Submeta um Pull Request

✨ Código Limpo
O projeto segue boas práticas como:

Separação de responsabilidades (cada classe com uma função clara)

Nome de métodos e variáveis descritivos

Reuso de código com métodos auxiliares

Sanitização de entradas (filter_input, htmlspecialchars, etc.)

🧪 Testes Automatizados
⚠️ Ainda não foram implementados testes automatizados neste projeto, mas a estrutura orientada a objetos permite fácil aplicação de testes futuros (ex: PHPUnit).

🧠 Padrões de Projeto
Utilização básica de DAO (Data Access Object) nas classes autor, livro, genero para abstração da camada de persistência.

Organização em arquivos de classe separados com require e include_once.

Biblioteca-virtual/
├── cadastroAutor.php
├── cadastroGenero.php
├── cadastroLivro.php
├── editarLivro.php
├── index.php
├── includes/
│   ├── classes/
│   │   ├── autor.php
│   │   ├── genero.php
│   │   ├── livro.php
│   │   └── Conexao.php
│   ├── estilos/
│   │   └── style.css
│   └── functions/
│       └── funcoes.js
├── sql/
│   └── biblioteca_com_cascade.sql
└── README.md
