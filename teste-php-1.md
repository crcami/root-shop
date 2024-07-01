# Desafio de PHP

Este é um desafio que foi realizado para avaliar minhas habilidades Fullstack usando PHP.

## Pré-requisitos para Uso

Certifique-se de que você tem as seguintes ferramentas instaladas em seu sistema:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Passos para Configuração

1. **Clone o Repositório**

Faça um clone em sua máquina local.

```sh
git clone https://github.com/crcami/testePHP.git
cd testePHP
```

## Crie o Arquivo .env

Copie o arquivo .env.example para .env e ajuste as configurações conforme necessário.

```sh
cp .env.example .env
```

## Construa os Contêineres Docker

Use o comando abaixo para construir os contêineres Docker:

```sh
docker-compose build
```
## Suba os Contêineres Docker

Use o comando abaixo para iniciar os contêineres Docker:

```sh
docker-compose up
```
## Execute as Migrações

Após subir os contêineres, execute as migrações do banco de dados:

```sh
docker-compose exec app php artisan migrate

# Caso deseje realizar uma migração limpando o DB
docker-compose exec app php artisan migrate:fresh
```

## Popule o Banco de Dados

Opcionalmente, você pode popular o banco de dados com dados iniciais usando seeds:

```sh
docker-compose exec app php artisan db:seed
```

## Acessando a Aplicação

Após seguir os passos acima, a aplicação estará disponível em http://localhost/8000.