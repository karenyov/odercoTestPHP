# Teste Oderço PHP
Teste Oderço

## Requisitos
- [Docker](https://docs.docker.com/engine/install/).


## Instalação

Baixando o projeto.
```sh
git clone https://github.com/karenyov/odercoTestPHP.git
```

Na raiz do projeto abra o terminal e execute o comando:
```sh
docker-compose up -d --build
```

Alterar o arquivo .env.example (remover o .example) e deixar as configurações do banco conforme o container:
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=cotacaodb
DB_USERNAME=root
DB_PASSWORD=root
```

Entrar no container e executar o seguintes comandos:
```sh
docker exec -it app bash #entrando no container

composer install #instalar as dependências via composer

#preparando a estrutura do laravel e do database
php artisan key:generate
php artisan migrate
php artisan db:seed
```

## Estrutura do Projeto
```sh
.
├── app
│   ├── Console
│   ├── Exceptions
│   ├── Http
│   |   ├── Controllers
│   |   ├── Middleware
│   |   ├── Requests
│   |   ├── Resources
│   |   └── Kernel.php
│   ├── Providers
│   ├── Repositories
│   └── User.php
├── bootstrap
├── config
├── database
│   ├── factories
│   ├── migrations
│   └── seeds
├── docker-files
│   ├── mysql
│   ├── nginx
│   │   └── default.conf
├── public
├── resources
│   ├── js
│   ├── lang
│   └── sass
├── routes
├── storage
├── tests
├── vendor
├── .editorconfig
├── .env.example
├── .gitattributes
├── .gitignore
├── artisan
├── composer.json
├── composer.lock
├── docker-compose.yml
├── Dockerfile
├── package.json
├── phpunit.xml
├── README.md
├── server.php
└── webpack.mix.js
```

## ENDPOINTS

### ENDPOINT - `api/cotacao`

#### [POST] - `api/cotacao`
| Parâmetro | Descrição |
|---|---|
| `uf` | Nome da Marca |
| `percentual_cotacao` | Percentual de Cotação |
| `valor_extra` | Valor Extra |
| `transportadora_id` | Transportadora ID |

+ Request (application/json)

    + Body

            {
                "uf" : "PR",
                "percentual_cotacao" : 2.95,
                "valor_extra" : 14.35,
                "transportadora_id" : 1
            }

+ Response 200 (application/json)

    + Body

            {
                "success": true,
                "data": {
                    "id": 1,
                    "uf": "PR",
                    "transportadora_id": 1,
                    "percentual_cotacao": 2.95,
                    "valor_extra": 14.35
                },
                "message": "Cotação inserida com sucesso."
            }

#### [PUT] - `api/cotacao`
Lista as  3 melhores cotações.

| Parâmetro | Descrição |
|---|---|
| `uf` | SP |
| `valor_pedido` | Valor do Pedido |

+ Request (application/json)

    + Body

            {
                "uf" : "SP",
	            "valor_pedido" : "565.70"
            }

+ Response 200 (application/json)

    + Body

            {
                "success": true,
                "data": [
                    {
                        "id": 7,
                        "uf": "SP",
                        "transportadora_id": 1,
                        "percentual_cotacao": "1.20",
                        "valor_extra": "7.00",
                        "valor_cotacao": "9.00",
                        "transportadora": "TNT Mercúrio Cargas e Encomendas Expressas",
                    },
                    {
                        "id": 8,
                        "uf": "SP",
                        "transportadora_id": 2,
                        "percentual_cotacao": "1.90",
                        "valor_extra": "10.00",
                        "valor_cotacao": "10.00",
                        "transportadora": "TNT Mercúrio Cargas e Encomendas Expressas",
                    }
                ],
                "message": "Cotações carregadas com sucesso."
            }

## Comandos úteis
```sh
# lista os containers dessa aplicação
docker-compose ps
# acessa o terminal do container php
docker container exec -it app bash
# para os containers
docker-compose stop
# para e remove os containers
docker-compose down
```

## Acessando a API
Por padrão a porta configurada no docker é a 8100 (http://localhost:8100/api).
