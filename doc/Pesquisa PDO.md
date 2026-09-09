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

---

## Diferenças entre PDO e MySQLi

| Característica | PDO | MySQLi |
|---|---|---|
| **Compatibilidade** | Múltiplos bancos de dados | Apenas MySQL |
| **Orientação a Objetos** | Totalmente orientado a objetos | Objetos e Procedural |
| **Segurança (SQL Injection)** | Suporte a prepared statements | Suporte a prepared statements |
| **Facilidade de Portabilidade** | Alta | Baixa |
| **Performance** | Similar (para MySQL) | Otimizada para MySQL |
| **Suporte a Recursos Específicos** | Menor foco em MySQL | Suporte exclusivo ao MySQL |

### Referência

> AMORIM, Gunter. **PHP – PDO vs MySQLi**. Disponível em: <https://blog.grancursosonline.com.br/php-pdo-vs-mysqli/>. Acesso em: 9 set. 2026.

---

## Vantagens e desvantagens de utilizar PDO

A principal vantagem do PDO está no objetivo de fornecer uma biblioteca limpa e consistente, deixando unificadas as características das extensões que acessam os bancos de dados.

Porém, o PDO possui também algumas desvantagens. Por exemplo, não efetua a leitura e tradução das [instruções SQL](https://www.devmedia.com.br/10-instrucoes-sql-para-manipulacao-de-dados/4832); é apenas realizada uma fusão dos métodos enviados para as respectivas extensões.

### Referência

> PALMEIRA, Thiago. **Introdução ao PDO (PHP Data Objects): Aprenda agora!** Disponível em: <https://www.devmedia.com.br/introducao-ao-php-data-objects-pdo/25318>. Acesso em: 9 set. 2026.

---
