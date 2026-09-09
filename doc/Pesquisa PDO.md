# PDO (PHP Data Objects)

**PDO (PHP Data Objects)** é uma extensão do PHP que fornece uma interface padronizada e orientada a objetos para comunicação com bancos de dados relacionais.

## Para que é utilizado

Serve como uma camada de abstração de acesso a dados. Em vez de utilizar funções específicas para cada banco, como `mysqli_*` para MySQL ou `pg_*` para PostgreSQL, o PDO permite interagir com múltiplos sistemas de banco de dados — MySQL, PostgreSQL, SQLite, SQL Server, Oracle, entre outros — utilizando o mesmo conjunto de métodos no PHP.

## Como funciona a conexão via PDO

A conexão é estabelecida criando uma nova instância da classe `PDO`. Ela exige um **DSN (Data Source Name)** — uma string com o driver, host e nome do banco —, além de usuário, senha e opções de configuração.

## Principais Características

- **Abstração de Acesso a Dados:** Permite mudar o SGBD subjacente (ex.: de MySQL para PostgreSQL) sem precisar reescrever as chamadas de métodos da aplicação, alterando apenas a DSN e ajustes pontuais de SQL.

- **Suporte a Prepared Statements:** Permite o uso de consultas preparadas (`prepare()` e `execute()`), separando a instrução SQL dos dados enviados, o que ajuda a prevenir ataques por SQL Injection.

- **Tratamento de Erros via Exceções:** Permite configurar o tratamento de falhas no banco via `PDOException`, tornando o código mais seguro e limpo.

- **Orientação a Objetos:** Utiliza métodos padronizados, como `prepare()`, `execute()`, `fetch()` e `fetchAll()`, para manipular resultados.

- **Suporte a Transações:** Oferece controle nativo para iniciar, confirmar ou desfazer blocos de operações SQL com `beginTransaction()`, `commit()` e `rollBack()`.

### Referência

> PHP DOCUMENTATION GROUP. **PDO: Objetos de Dados do PHP**. Manual do PHP, 2026. Disponível em: <https://www.php.net/manual/pt_BR/book.pdo.php>. Acesso em: 9 set. 2026.