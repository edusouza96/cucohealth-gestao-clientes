## API 
### Técnologias 
- PHP 8.1
- Laravel 9
- Composer 2
- MySql

### Como Executar
- Rodar o comando  ``` git clone edusouza96/cucohealth-gestao-clientes ```
- Criar banco de dados, sugestão de nome **client_manager**
- Acessar ```cd api```
- Rodar o comando  ``` composer install```
- Renomear o arquivo ``` .env.example``` para  ``` .env```
- Ajustar as variaveis no arquivo  ``` .env```
    - DB_CONNECTION
    - DB_HOST
    - DB_PORT
    - DB_DATABASE
    - DB_USERNAME
    - DB_PASSWORD
- Rodar o comando  ``` php artisan migrate```
- Rodar o comando  ``` php artisan serve```

### Postman documentação endpoints
- https://documenter.getpostman.com/view/3050772/2s93Jox5cX