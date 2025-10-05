# 🪄 Magic No Limits — Sistema de Loja em PHP

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)]()
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)]()
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)]()
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)]()
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)]()
[![License](https://img.shields.io/badge/Licença-MIT-green?style=for-the-badge)]()

> 💻 Projeto acadêmico desenvolvido na disciplina de **Linguagem Web em PHP**, com o objetivo de aplicar conceitos de **desenvolvimento full stack**, boas práticas de código e integração com **banco de dados MySQL**.

---

## 📸 Demonstração

<div align="center">
  <img src="https://via.placeholder.com/900x500?text=Preview+do+Sistema+Magic+No+Limits" alt="Preview do projeto Magic No Limits" width="80%" />
  <br/>
  <em>Interface principal — cadastro e listagem de produtos.</em>
</div>

---

## 🚀 Tecnologias Utilizadas

- **PHP** — lógica de servidor e integração com banco de dados  
- **MySQL** — armazenamento e manipulação de dados  
- **HTML5 / CSS3 / JavaScript** — estrutura, estilo e interatividade  
- **Apache / XAMPP** — ambiente local de execução  

---

## 🎯 Funcionalidades Principais

- Cadastro, edição e exclusão de **produtos**, **clientes**, **fornecedores** e **vendas**  
- **Login** e **controle de sessão** com verificação de autenticação  
- **Listagem dinâmica** de dados em tabelas  
- Estrutura modular via **includes PHP** (`inc.*.php`)  
- Integração com **MySQL** via arquivo `loja2.sql`  

---

## 🗂 Estrutura do Projeto

magic-nolimits/
├── index.php
├── inc.connect.php
├── inc.login.php
├── inc.logoff.php
├── inc.produtos.php
├── acao_cadastroprod.php
├── loja2.sql
├── /images
└── /arquivo


---

## ⚙️ Como Executar Localmente

1. **Clone o repositório**
   ```bash
   git clone https://github.com/RenanSchmitt/magic-nolimits.git
   cd magic-nolimits
mysql -u seu_usuario -p sua_base < loja2.sql

php -S localhost:8000

🧱 Estrutura Técnica

Comunicação PHP ↔ MySQL

Modularização com includes (inc.*.php)

Ações independentes em acao_*.php

Banco de dados replicável via loja2.sql

Interface simples e responsiva

🧩 Possíveis Melhorias Futuras

Aplicar prepared statements (segurança contra SQL Injection)

Criptografia de senhas com password_hash()

Organização em MVC ou micro-framework

Validação de formulários no front e back-end

Upload seguro e otimizado de imagens

🖼️ Direitos Autorais e Imagens

Algumas imagens utilizadas neste projeto foram obtidas de fontes públicas e são usadas exclusivamente para fins educacionais.
Caso você seja o detentor de direitos sobre alguma delas e deseje sua remoção, entre em contato comigo e ela será excluída imediatamente.

💼 Sobre o Autor

👋 Olá! Meu nome é Renan Schmitt, sou UX/UI Designer, Analista de Projetos e Desenvolvedor Web.
Atuo com Node.js, React, MySQL e PHP, desenvolvendo aplicações completas com foco em usabilidade e performance.

🔗 Portfólio

💼 LinkedIn

📧 renanschmitt@gmail.com

🧾 Licença

Este projeto está sob a licença MIT — sinta-se à vontade para estudar, modificar e aprimorar.
