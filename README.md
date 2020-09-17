# Aplicação para estudo

## Sobre o projeto
Usando a API do [Studio Ghibili](https://ghibliapi.herokuapp.com/), com o intuito de coletar dados e colocar em nossa base, onde esses dados foram films e people.
e desenvolver comandos no artisan para popular a base.

1. Comando Artisan, usando o seguinte nome: api:crawl
2. Agendado via schedule do Laravel à cada duas horas

Retornar uma rota GET /pessoas com os respectivos valores.

O projeto foi desenvolvido no framework PHP [Laravel](https://laravel.com/).

## Getting Started Guide
Guia de instalação da aplicação, Documentação: <https://laravel.com/docs/7.x/installation>

### Pré-requisitos
 
- Composer
- PHP >= 7.1.3

### Instalação
- Clonar repositorio 
```sh 
$ git clone https://github.com/lukasvicente/api-studio-ghibli.git
```
 - Instalar o composer
 ```sh 
$ composer install
```
- Renomear ou Copiar .env.example arquivo para .env #editar campos com credenciais do banco
```sh 
$ cp .env.example .env 
```
- Gerar key

```sh 
$ php artisan key:generate
```
- Gerar migrate da aplicação

```sh 
$ php artisan migrate
```

- Aplicação em execução

```sh 
$ php artisan serve
```


- Para acessar a Aplicação em execução

```sh 
http://localhost:8000/
```

### Para popular a base de dados com as informaçes da API Studio Ghibli

```sh 
$ php artisan api:crawl
 
```


### Para a aplicação popular a base de duas em duas horas

- De acordo com o linux, alterar o crontab

```sh 
$ nano /etc/crontab
 ```
 - Adicionar linha, de acordo com a documentação laravel, https://laravel.com/docs/7.x/scheduling
```sh 
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
 ```
  - Iniciar o cron
```sh 
$service cron start
 ```
