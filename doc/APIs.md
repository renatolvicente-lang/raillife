# APIs: conceitos, REST, HTTP, JSON e segurança

**Projeto:** RAILLIFE
**Tema:** Pesquisa sobre APIs (Application Programming Interfaces)
**Data:** 21 de outubro de 2026

> **Nota sobre os exemplos.** Os exemplos de URLs, campos JSON e código usam o domínio do RAILLIFE (trens, sensores e rotas), mas são **didáticos e hipotéticos**: os nomes de endpoints, tabelas e campos não descrevem o sistema real. O domínio `api.raillife.example` usa o sufixo reservado `.example` e não existe na internet.

---

## Sumário

1. [O que é uma API e qual é sua finalidade](#1-o-que-é-uma-api-e-qual-é-sua-finalidade)
2. [Como funciona a comunicação entre sistemas por meio de APIs](#2-como-funciona-a-comunicação-entre-sistemas-por-meio-de-apis)
3. [O que são APIs REST](#3-o-que-são-apis-rest)
4. [O papel dos métodos HTTP](#4-o-papel-dos-métodos-http)
5. [Requisições e respostas HTTP](#5-requisições-e-respostas-http)
6. [O que são endpoints](#6-o-que-são-endpoints)
7. [Troca de dados em JSON](#7-troca-de-dados-em-json)
8. [Diferenças entre uma API e um sistema web tradicional](#8-diferenças-entre-uma-api-e-um-sistema-web-tradicional)
9. [Como uma aplicação PHP pode consumir uma API](#9-como-uma-aplicação-php-pode-consumir-uma-api)
10. [Como uma API pode disponibilizar informações para outros sistemas](#10-como-uma-api-pode-disponibilizar-informações-para-outros-sistemas)
11. [Autenticação, autorização e segurança](#11-autenticação-autorização-e-segurança)
12. [Exemplos de uso de APIs em sistemas empresariais](#12-exemplos-de-uso-de-apis-em-sistemas-empresariais)
13. [Conclusão](#13-conclusão)
14. [Referências](#referências)

---

## 1. O que é uma API e qual é sua finalidade

Uma **API** (*Application Programming Interface*, ou Interface de Programação de Aplicações) é um conjunto de funcionalidades e regras que existem dentro de um software e permitem interagir com ele por meio de **outro software**, em vez de por uma interface de usuário voltada a pessoas. Pode ser entendida como um **contrato** entre a aplicação que a oferece e outros programas ou equipamentos que a utilizam (MDN WEB DOCS, 2025).

No desenvolvimento web, uma API costuma ser um conjunto de recursos de código (métodos, propriedades, eventos e URLs) que o desenvolvedor usa para interagir com o navegador, com outros programas ou com serviços de terceiros (MDN WEB DOCS, 2025). Neste trabalho, o foco são as **APIs web**, acessadas por meio do protocolo HTTP.

### Finalidades principais

- **Integração:** sistemas desenvolvidos separadamente (e muitas vezes em linguagens diferentes) trocam dados sem conhecer o código um do outro.
- **Abstração e encapsulamento:** o HTTP oculta os detalhes de como um serviço é implementado e oferece uma interface uniforme, independente do tipo de recurso. Isso permite que cliente e servidor **evoluam de forma independente** (FIELDING; NOTTINGHAM; RESCHKE, 2022, seç. 1.1).
- **Reuso:** a mesma regra de negócio atende site, aplicativo móvel, painéis e equipamentos.
- **Automação:** processos que dependiam de digitação ou conferência manual passam a ser executados por programas.

### Relação com o RAILLIFE

O RAILLIFE é um sistema de gerenciamento ferroviário com CRUD para trens e sensores e menu com as áreas Trens, Sensores, Rotas e Relatórios. Sua página inicial descreve a coleta de dados de **sensores IoT** em tempo real, apresentados em um painel de controle. Uma API é o componente natural para esse cenário: os sensores enviam leituras para ela, e o painel, relatórios e outros sistemas consultam os dados por ela.

---
