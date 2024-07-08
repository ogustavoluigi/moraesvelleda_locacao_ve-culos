# Sistema de locação de veículos

## Introdução
Sistema de locação de veículos.

## Requisitos
- PHP ^8.2
- Node.js ^20.15
- MySQL
- Composer
- npm ou yarn

## Instalação
Passos para clonar o repositório e instalar as dependências.

```bash
# Clone o repositório
git clone https://github.com/ogustavoluigi/moraesvelleda_locacao_veiculos.git
cd moraesvelleda_locacao_veiculos

# Instale as dependências PHP
composer install

# Instale as dependências JavaScript
npm install
# ou
yarn install

# Copie o arquivo .env.example para .env
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate

# Criar o link simbólico
php artisan storage:link

# Configure o arquivo .env com as informações do seu banco de dados
# Abra o arquivo .env e edite as seguintes linhas:

# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=nome_do_banco_de_dados
# DB_USERNAME=seu_usuario
# DB_PASSWORD=sua_senha

# Se você instalou o projeto em uma subpasta, configure a URL base do Vite e edite a seguinte linha:

# VITE_BASE_URL="/path/public/"

# Execute as migrations
php artisan migrate

# Execute os seeders
php artisan db:seed

# Execute o build do Vite
npm run build
