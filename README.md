# Receitas Médicas

## Visão Geral
O projeto "Receitas Médicas" é uma aplicação web desenvolvida em PHP que permite a gestão de receitas médicas. A aplicação permite que os usuários registrem, visualizem, alterem e apaguem receitas médicas. Além disso, há um sistema de autenticação para garantir que apenas usuários autorizados possam acessar e manipular os dados.

## Funcionalidades
1. **Autenticação de Usuários**:
   - **Login**: Os usuários podem fazer login utilizando um nome de usuário e senha.
   - **Registro**: Novos usuários podem se registrar na aplicação.

2. **Gestão de Receitas Médicas**:
   - **Listar Receitas**: Exibe uma lista de todas as receitas cadastradas.
   - **Adicionar Receita**: Permite adicionar uma nova receita médica.
   - **Alterar Receita**: Permite alterar os dados de uma receita existente.
   - **Visualizar Receita**: Exibe os detalhes de uma receita específica.
   - **Apagar Receita**: Permite apagar uma receita do sistema.

## Estrutura do Projeto
A estrutura do projeto é organizada da seguinte forma:

- **Banco de Dados**:
  - O arquivo `bd/database.sql` contém os comandos SQL para criar as tabelas `usuarios` e `receitas`.

- **Configuração de Conexão**:
  - O arquivo `config/config.php` define as constantes de configuração para a conexão com o banco de dados.
  - O arquivo `connect/db_connect.php` estabelece a conexão com o banco de dados utilizando as configurações definidas.

- **Autenticação**:
  - `index.php`: Página de login.
  - `register.php`: Página de registro de novos usuários.

- **Gestão de Receitas**:
  - `listar.php`: Página que lista todas as receitas.
  - `novo.php`: Página para adicionar uma nova receita.
  - `alterar.php`: Página para alterar uma receita existente.
  - `visualizar.php`: Página para visualizar os detalhes de uma receita.
  - `apagar.php`: Script para apagar uma receita.

- **CSS**:
  - O arquivo `css/style.css` contém todas as regras de estilo aplicadas às páginas da aplicação.

- **JavaScript**:
  - O arquivo `js/validacao.js` contém a validação de formulários para as páginas de login e registro.

## Instalação
1. **Clone o repositório**:
   ```bash
   git clone https://github.com/seu-usuario/receitas-medicas.git
   ```

2. **Configure o banco de dados**:
   - Crie um banco de dados chamado `receitasmedicas`.
   - Importe o arquivo `bd/database.sql` para criar as tabelas necessárias.

3. **Configure o projeto**:
   - Certifique-se de que o arquivo `config/config.php` contém as configurações corretas para a conexão com o banco de dados.

4. **Inicie o servidor**:
   - Coloque os arquivos do projeto na pasta `htdocs` do XAMPP.
   - Inicie o Apache e o MySQL no painel de controle do XAMPP.

5. **Acesse a aplicação**:
   - No seu navegador, acesse `http://localhost/receitas-medicas`.

## Uso
1. **Registro de Usuário**:
   - Acesse `http://localhost/receitas-medicas/register.php` para registrar um novo usuário.

2. **Login**:
   - Acesse `http://localhost/receitas-medicas/index.php` para fazer login.

3. **Gestão de Receitas**:
   - Após fazer login, você será redirecionado para a página de listagem de receitas (`listar.php`).
   - Utilize as opções disponíveis para adicionar, visualizar, alterar ou apagar receitas.

## Contribuição
Contribuições são bem-vindas! Sinta-se à vontade para abrir uma issue ou enviar um pull request.

## Licença
Este projeto está licenciado sob a [MIT License](LICENSE).
