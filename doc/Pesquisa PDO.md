# PDO (PHP Data Objects)

**PDO (PHP Data Objects)** é uma extensão do PHP que fornece uma interface padronizada e orientada a objetos para comunicação com bancos de dados relacionais.

## Para que é utilizado

Serve como uma camada de abstração de acesso a dados. Em vez de utilizar funções específicas para cada banco, como `mysqli_*` para MySQL ou `pg_*` para PostgreSQL, o PDO permite interagir com múltiplos sistemas de banco de dados — MySQL, PostgreSQL, SQLite, SQL Server, Oracle, entre outros — utilizando o mesmo conjunto de métodos no PHP.

## Como funciona a conexão via PDO

A conexão é estabelecida criando uma nova instância da classe `PDO`. Ela exige um **DSN (Data Source Name)** — uma string com o driver, host e nome do banco —, além de usuário, senha e opções de configuração.