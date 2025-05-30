# 📚 Biblioteca Virtual

## ✅ Objetivo do Projeto

O objetivo desta aplicação é criar uma **Biblioteca Virtual**, onde será possível cadastrar, 
visualizar, editar e excluir livros. Este sistema é um projeto prático da disciplina **Tecnologias Emergentes**, 
que visa aplicar os conhecimentos em desenvolvimento web utilizando tecnologias modernas e persistência de dados.

A aplicação permitirá o gerenciamento de um acervo de livros de forma simples e intuitiva, servindo como base para sistemas maiores no futuro.

---

## 🛠 Tecnologias Utilizadas

A aplicação será desenvolvida utilizando a seguinte stack:

- **PHP** – Linguagem de programação para o desenvolvimento do backend.
- **MySQL** – Banco de dados relacional para persistência dos dados.
- **PDO (PHP Data Objects)** – Biblioteca para acesso seguro ao banco de dados, evitando SQL Injection.
- **HTML5** – Estruturação das páginas web.
- **CSS3** – Estilização das páginas.
- **JavaScript** – Comportamentos e interações dinâmicas.
- **Bootstrap**  – Framework CSS para facilitar a criação de um design responsivo e moderno.

---

## 🧩 Funcionalidades

A aplicação irá conter um sistema completo de **CRUD**:

- **Create** – Cadastro de novos livros.
- **Read** – Listagem dos livros cadastrados.
- **Update** – Edição dos dados de um livro.
- **Delete** – Remoção de livros do sistema.

---

## 🧾 Estrutura Inicial

biblioteca/
- ├── index.php                  # Página inicial com listagem de livros.
- ├── create.php                 # Formulário de cadastro de novo livro.
- ├── store.php                  # Lógica para salvar livro no banco.
- ├── edit.php                   # Formulário de edição de livro.
- ├── update.php                 # Lógica para atualizar livro.
- ├── delete.php                 # Lógica para excluir livro.
- ├── db.php                     # Conexão com o banco de dados (PDO).
- └── README.md                  # Documentação do projeto.
