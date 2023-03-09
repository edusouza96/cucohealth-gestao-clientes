# Sem Docker

## API 
### Tecnologias 
- PHP 8.1
- Laravel 9
- Composer 2
- MySql

### Como Executar
- Rodar o comando  ``` git clone https://github.com/edusouza96/cucohealth-gestao-clientes.git ```
- Criar banco de dados ``` CREATE DATABASE IF NOT EXISTS client_manager; ```
- Acessar ```cd api```
- Renomear o arquivo ``` .env.example``` para  ``` .env```
- Ajustar as variaveis no arquivo  ``` .env```
    DB_USERNAME=NOME_DO_SEU_USUARIO_DE_BANCO_DE_DADOS
    DB_PASSWORD=SENHA_DO_SEU_USUARIO_DE_BANCO_DE_DADOS
- Rodar o comando  ``` composer install```
- Rodar o comando  ``` php artisan key:generate```
- Rodar o comando  ``` php artisan migrate```
- Rodar o comando  ``` php artisan serve```

configurado para rodar em http://localhost:8000/

### Postman documentação endpoints
- https://documenter.getpostman.com/view/3050772/2s93Jox5cX

## APP 
### Tecnologias 
- Vue.js 3
- Bootstrap 5

### Como Executar
- Rodar o comando  ``` git clone edusouza96/cucohealth-gestao-clientes ```
- Acessar ```cd app```
- Rodar o comando  ``` npm install```
- Rodar o comando  ``` php run dev```

configurado para rodar em http://localhost:5173/
