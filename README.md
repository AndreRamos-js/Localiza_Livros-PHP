# Projeto Biblioteca

Este projeto é uma aplicação de controle de biblioteca, desenvolvida em PHP, HTML e CSS, com o uso de um banco de dados MySQL para armazenamento de informações.

**OBSERVAÇÃO**
- Eu decidi desenvolver o projeto sem a utilização de um framework ou template com a intenção de demonstrar minhas habilidade com PHP puro, algo personalizado e feito a mão. Porém, gostaria de salientar que possuo conhecimentos para desenvolver utilizando Laravel e AdminLTE que facilitam por exemplo a criação de paineis administrativos e dashboards.
Desde já, obrigado pela oportunidade!

## Ferramentas Utilizadas

**Linguagem de Programação:**
   - PHP

**Banco de Dados:**
   - MySQL

**Front-end:**
   - HTML
   - CSS
   - 
**Servidor Web:**
   - WampServer

**Controle de Versão:**
   - Git

## Estrutura do Projeto

- **public/admin/cliente:** Contém páginas relacionadas à gestão de clientes (cadastro, visualização, edição e exclusão).
- **public/admin/livro:** Contém páginas relacionadas à gestão de livros(cadastro, visualização, edição e exclusão).
- **public/admin/locacao:** Contém páginas relacionadas à gestão de locações(cadastro, visualização, edição e exclusão).
- **config:** Configurações, como a conexão com o banco de dados e script para que crie o esquema no MySQL caso necessario.
- **biblioteca/controllers:** Controladores PHP para a lógica de negócios.
- **biblioteca/actions:** Contém scripts PHP que processam ações específicas (cadastro, edição e exclusão).
- **biblioteca/css:** Arquivos de estilo CSS.

## Instruções de Configuração

**Ambiente de Desenvolvimento:**
   - Instale um servidor web local (WAMP, XAMPP).
   - Certifique-se de ter o PHP e o MySQL instalados.

**Banco de Dados:**
   - Importe o arquivo database.sql para criar as tabelas necessárias.

     -PS: O arquivo db.sql contem o script para criar o esquema no banco de dados MySQL.

**Configuração do Banco de Dados:**
   - Edite `config/database.php` com as configurações do seu banco de dados.

**Acesso à Aplicação:**
   - Acesse a aplicação via navegador, usando o endereço do servidor local.

## Licença

Este projeto está sob a Licença GNU General Public License v3.0 - veja o arquivo [LICENSE](LICENSE) para detalhes.
