# Gateway de Pagamento

Este projeto tem como objetivo aprender como integrar uma aplicação Laravel com o gateway de pagamento do PagSeguro de maneira simples.

## Tecnologias

* [PHP - versão 7.2 ou superior](https://www.php.net/)
* [Laravel - versão 7.x](https://laravel.com/docs/7.x)
* [Javascript](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript)
* [Bootstrap](https://getbootstrap.com/)
* [SDK do Pagseguro](https://github.com/pagseguro/pagseguro-sdk-php)
* [Cleave.js](https://nosir.github.io/cleave.js/) - Format your input content when you are typing

## Requisitos

Você precisar ter instalado na sua máquina:

* Servidor Web (XAMPP, WAMPP, etc.) com PHP, MySQL e Apache.
* [NodeJS - versão que seja LTS](https://nodejs.org/en/) ou [Yarn](https://yarnpkg.com/)
* [Composer](https://getcomposer.org/)

## Instruções

1º) Faça o clone do projeto 
```
git clone https://github.com/williamtome/gateway-pagamento.git
```
2º) Execute os comando abaixo para instalar o projeto e suas dependências:
```
composer install
npm install
npm run dev
```
3º) Execute o comando abaixo para criar todas as tabelas do projeto no seu banco de dados:
````
php artisan migrate
````
4º) Para rodar o projeto, execute o comando:
````
php artisan serve
````
Depois acesse <code>localhost:8000</code> e pronto!

## Autor
**William Weirich Tomé**

## Referências

[Documentação do SDK do PagSeguro](https://github.com/pagseguro/pagseguro-sdk-php)
[Documentação das Checkout Transparente do PagSeguro](https://dev.pagseguro.uol.com.br/reference/checkout-transparente)
